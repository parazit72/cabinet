<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title', 250);
            $table->string('slug', 250)->unique();
            $table->text('description');
            $table->text('summary');
            $table->string('status')->default('Draft');
            $table->text('intro_image')->nullable();
            $table->text('main_image')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->integer('post_collection_id')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('redirect')->nullable();
            $table->bigInteger('views')->default(0);
            $table->boolean('special')->default(false);
            $table->timestamp('published_at')->default(now());
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
        Schema::enableForeignKeyConstraints();
    }
}
