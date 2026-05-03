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
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('phone_number');
            $table->decimal('amount', 15, 2);
            $table->string('mpesa_receipt_number')->unique();
            $table->string('transaction_type');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->json('response_payload')->nullable();
            $table->timestamp('transaction_date');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['phone_number', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_transactions');
    }
};
