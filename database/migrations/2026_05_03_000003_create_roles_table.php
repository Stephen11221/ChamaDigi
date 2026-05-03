<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique();
            $table->text('description')->nullable();
            $table->json('permissions_json')->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['role_name' => 'Admin', 'description' => 'Platform administrator with full access', 'permissions_json' => json_encode([]), 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Treasurer', 'description' => 'Manages contributions, payments and financial records', 'permissions_json' => json_encode([]), 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Secretary', 'description' => 'Organizes meetings, reports and member communications', 'permissions_json' => json_encode([]), 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Member', 'description' => 'Standard group member with limited access', 'permissions_json' => json_encode([]), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
