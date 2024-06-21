<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\AppUser;

class CreateAppUsersTable extends Migration
{
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->timestamps();
        });

        // Add default admin user if it doesn't exist
        if (!AppUser::where('username', 'admin')->exists()) {
            AppUser::create([
                'username' => 'admin',
                'email' => 'admin@blacklistsellers.com',
                'password' => Hash::make('000000000'),
                'role' => 'admin',
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('app_users');
    }
}


