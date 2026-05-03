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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('meeting_date');
            $table->time('meeting_time');
            $table->string('location');
            $table->enum('meeting_type', ['physical', 'virtual', 'hybrid']);
            $table->enum('status', ['upcoming', 'completed', 'cancelled'])->default('upcoming');
            $table->text('agenda');
            $table->text('meeting_minutes')->nullable();
            $table->decimal('attendance_percentage', 5, 2)->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['meeting_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
