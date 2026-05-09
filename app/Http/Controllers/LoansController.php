<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanApproval;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LoansController extends Controller
{
    public function index(): View
    {
        $role = strtolower(Auth::user()->role?->role_name ?? 'member');

        $loans = Loan::query()
            ->with(['borrower', 'guarantor', 'approvals.approver', 'approver'])
            ->withCount('approvals')
            ->when(! in_array($role, ['admin', 'treasurer'], true), fn ($query) => $query->where('user_id', Auth::id()))
            ->orderByDesc('created_at')
            ->get();

        $members = User::with('role')
            ->orderBy('full_name')
            ->get();

        return view('pages.loans.index', [
            'loans' => $loans,
            'members' => $members,
            'isTreasuryStaff' => in_array($role, ['admin', 'treasurer'], true),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'guarantor_id' => ['required', 'integer', 'exists:users,id'],
            'loan_amount' => ['required', 'numeric', 'min:1', 'max:50000'],
            'duration_months' => ['required', 'integer', 'min:1', 'max:60'],
            'purpose' => ['required', 'string', 'max:5000'],
        ]);

        $principal = (float) $data['loan_amount'];
        $rate = 2.0;
        $months = (int) $data['duration_months'];
        $totalRepayable = $principal + ($principal * ($rate / 100) * $months);
        $monthlyPayment = $totalRepayable / max($months, 1);

        Loan::create([
            'user_id' => Auth::id(),
            'guarantor_id' => $data['guarantor_id'],
            'loan_amount' => $principal,
            'interest_rate' => $rate,
            'total_repayable' => $totalRepayable,
            'monthly_payment' => $monthlyPayment,
            'duration_months' => $months,
            'purpose' => $data['purpose'],
            'approval_status' => 'pending',
            'repayment_status' => 'active',
        ]);

        return redirect()->route('loans')->with('success', 'Loan application submitted.');
    }

    public function approve(Request $request, Loan $loan): RedirectResponse
    {
        $role = strtolower(Auth::user()->role?->role_name ?? '');
        abort_unless(in_array($role, ['admin', 'treasurer'], true), 403);
        abort_unless($loan->approval_status === 'pending', 422, 'This loan has already been processed.');

        $alreadyApproved = LoanApproval::where('loan_id', $loan->id)
            ->where('user_id', Auth::id())
            ->exists();

        abort_if($alreadyApproved, 422, 'You already approved this loan.');

        LoanApproval::create([
            'loan_id' => $loan->id,
            'user_id' => Auth::id(),
        ]);

        $approvalsCount = LoanApproval::where('loan_id', $loan->id)->count();

        if ($approvalsCount >= 2) {
            $loan->update([
                'approval_status' => 'approved',
                'approved_by' => Auth::id(),
                'approval_date' => now()->toDateString(),
            ]);
        }

        return redirect()->route('loans', ['loan' => $loan->id])->with('success', $approvalsCount >= 2 ? 'Loan approved.' : 'Approval recorded.');
    }
}
