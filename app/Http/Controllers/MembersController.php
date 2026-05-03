<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(): View
    {
        $members = User::with('role')->orderByDesc('created_at')->get();
        $roles = Role::orderBy('role_name')->get();

        $totalMembers = $members->count();
        $activeMembers = $members->where('status', 'active')->count();
        $leaderCount = $members->whereIn('role.role_name', ['Admin', 'Treasurer', 'Secretary'])->count();
        $adminCount = $members->where('role.role_name', 'Admin')->count();

        return view('pages.members.index', compact('members', 'roles', 'totalMembers', 'activeMembers', 'leaderCount', 'adminCount'));
    }

    public function store(Request $request): RedirectResponse
    {
        if (Auth::user()->role?->role_name !== 'Admin') {
            abort(Response::HTTP_FORBIDDEN);
        }

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'national_id' => ['required', 'string', 'max:30', 'unique:users,national_id'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'max:20'],
            'role' => ['required', 'string', 'in:Admin,Treasurer,Secretary,Member'],
            'location' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = Role::where('role_name', $request->role)->firstOrFail();

        User::create([
            'full_name' => $request->full_name,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role_id' => $role->id,
            'location' => $request->location,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('members')->with('success', 'Member account created successfully.');
    }
}
