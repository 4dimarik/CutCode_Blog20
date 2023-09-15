<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'user_roles',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        $timestamps = [
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('user_roles')->insert(
            [
                [
                    'name' => 'Guest',
                    ...$timestamps
                ],
                [
                    'name' => 'Admin',
                    ...$timestamps
                ],
                [
                    'name' => 'User',
                    ...$timestamps
                ],
                [
                    'name' => 'Author',
                    ...$timestamps
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
