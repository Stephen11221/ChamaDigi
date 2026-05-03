<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('guarantor_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('loan_amount', 15, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->decimal('total_repayable', 15, 2);
            $table->decimal('monthly_payment', 15, 2);
            $table->smallInteger('duration_months');
            $table->text('purpose');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('repayment_status', ['active', 'completed', 'defaulted'])->default('active');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('approval_date')->nullable();
            $table->date('disbursement_date')->nullable();
            $table->date('maturity_date')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'approval_status', 'repayment_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
