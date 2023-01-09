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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->string('post_title',200);
            $table->string('post_author',200);
            $table->date('post_date');
            $table->text('post_image')->nullable();
            $table->text('post_content')->nullable();
            $table->text('post_tags')->nullable();
            $table->enum('post_status',['draft','publish'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
