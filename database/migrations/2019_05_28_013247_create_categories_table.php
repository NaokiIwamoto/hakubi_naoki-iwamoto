<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('category');
            $table->text('describe');

            $table->unsignedInteger('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users');

            $table->unsignedInteger('edit_user_id');
            $table->foreign('edit_user_id')->references('id')->on('users');

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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['create_user_id']);
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['edit_user_id']);
        });

        Schema::dropIfExists('categories');
    }
}
