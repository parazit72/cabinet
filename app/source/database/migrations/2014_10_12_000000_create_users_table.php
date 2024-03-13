<?php

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
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('user_id');
            $table->string('email')->unique();
            $table->text('profile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type')->default('user');
            $table->enum('status', ['disabled', 'enabled', 'blocked'])->default('enabled');
            $table->string('api_token', 80)->nullable()->unique()->default(null);

            $table->integer('failed_login_attempts')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_change_password_at')->nullable();
            $table->boolean('must_change_password')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('username')->nullable();
            $table->string('device_id')->nullable();
            $table->string('email')->nullable();
            $table->string('ip')->nullable();
            $table->string('ip_behind_proxy')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('authentication_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('action');
            $table->text('request_data');
            $table->timestamps();
        });

        Schema::create('verification_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('code');
            $table->string('status')->nullable();
            $table->timestamp('expired_at');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::dropIfExists('devices');
        Schema::dropIfExists('authentication_logs');
        Schema::dropIfExists('verification_codes');
        Schema::enableForeignKeyConstraints();
    }
}
