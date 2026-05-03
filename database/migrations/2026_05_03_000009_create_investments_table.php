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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('investment_name');
            $table->enum('investment_type', ['money_market', 'real_estate', 'bond', 'fixed_deposit', 'stocks']);
            $table->decimal('initial_amount', 15, 2);
            $table->decimal('current_value', 15, 2)->nullable();
            $table->decimal('roi_percentage', 5, 2)->default(0);
            $table->decimal('total_returns', 15, 2)->default(0);
            $table->date('start_date');
            $table->date('maturity_date')->nullable();
            $table->enum('status', ['active', 'matured', 'closed'])->default('active');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['investment_type', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
