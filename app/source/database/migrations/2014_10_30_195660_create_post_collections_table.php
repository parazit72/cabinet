<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();


        Schema::create('post_collections', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('slug', 250)->unique();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('status')->default('Draft');
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::create('post_post_collection', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->unsignedBigInteger('post_collection_id');
        //     $table->unsignedBigInteger('post_id');
        // });

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

        Schema::dropIfExists('post_collections');
        // Schema::dropIfExists('post_post_collection');

        Schema::enableForeignKeyConstraints();
    }
}
