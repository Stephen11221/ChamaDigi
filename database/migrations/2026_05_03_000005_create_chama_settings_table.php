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
        Schema::create('chama_settings', function (Blueprint $table) {
            $table->id();
            $table->string('chama_name');
            $table->string('registration_number')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('physical_address');
            $table->decimal('default_monthly_contribution', 15, 2)->default(0);
            $table->decimal('default_loan_interest_rate', 5, 2)->default(0);
            $table->string('currency', 10)->default('KES');
            $table->string('meeting_default_location')->nullable();
            $table->boolean('notifications_email_enabled')->default(true);
            $table->boolean('notifications_sms_enabled')->default(false);
            $table->boolean('loan_reminder_enabled')->default(true);
            $table->boolean('payment_confirmation_enabled')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chama_settings');
    }
};
