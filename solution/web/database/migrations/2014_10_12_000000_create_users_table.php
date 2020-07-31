<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->binary('avatar')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->enum('gender', ['М','Ж'])->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('salt');
            $table->rememberToken();
            $table->timestamp('logged_at')->nullable();
            $table->timestamps();
        });

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@admin.ru',
            'salt' => '123QWE',
            'password' => Hash::make('123QWE123QWE')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
