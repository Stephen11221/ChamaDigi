<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meeting_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained('meetings')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('meeting_messages')->cascadeOnDelete();
            $table->text('message');
            $table->boolean('is_announcement')->default(false);
            $table->timestamps();

            $table->index(['meeting_id', 'parent_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meeting_messages');
    }
};
