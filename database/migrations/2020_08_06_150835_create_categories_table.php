<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->text('desc');
            $table->text('keyword');
            $table->string('order');
            $table->string('home_order');
            $table->boolean('visiblity')->default(1);
            $table->boolean('home_visiblity')->default(1);
            $table->boolean('image_visiblity')->default(1);
            $table->text('photo')->nullable();
            $table->boolean('deleted')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
