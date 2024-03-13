<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');

            $table->string('meta_title', 250)->nullable();

            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('status')->default('Published');
            
            $table->text('intro_image')->nullable();
            $table->text('main_image')->nullable();
            
            $table->text('redirect')->nullable();
            
            $table->string('template');


            $table->text('style')->nullable();
            $table->timestamps();
        });

        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->text('class')->nullable();
            $table->text('style')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('events')->nullable();
            $table->string('story')->nullable();
            $table->text('stories')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('service_settings', function (Blueprint $table) {
            $table->id();
            $table->text('class')->nullable();
            $table->text('style')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->text('class')->nullable();
            $table->text('style')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('home_settings');
        Schema::dropIfExists('about_settings');
        Schema::dropIfExists('service_settings');
        Schema::dropIfExists('page_settings');
    }
}