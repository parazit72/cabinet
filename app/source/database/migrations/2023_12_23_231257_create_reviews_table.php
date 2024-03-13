<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('profile')->nullable();
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->string('company')->nullable();
            $table->string('title')->nullable();
            $table->integer('order')->default(0);
            $table->text('body')->nullable();
            $table->string('status')->default('Published');
            $table->integer('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};