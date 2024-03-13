<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->text('icon')->nullable();
            $table->string('target')->default('_self');
            $table->string('status')->default('Enable');
            $table->integer('order')->default(0);
            $table->integer('parent')->nullable();
            $table->string('position')->default('header');
            $table->timestamps();
        });
        // Schema::create('footer_menus', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('url')->nullable();
        //     $table->text('icon')->nullable();
        //     $table->string('target')->default('_self');
        //     $table->string('status')->default('Enable');
        //     $table->integer('order')->default(0);
        //     $table->integer('parent')->nullable();
        //     $table->string('position')->default('col');
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
        // Schema::dropIfExists('footer_menus');
    }
}