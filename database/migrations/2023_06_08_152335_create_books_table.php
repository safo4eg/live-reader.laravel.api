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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 127);
            $table->text('description');
            $table->string('isbn', 17)->unique();
            $table->integer('genre_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->dateTime('date_of_writing')->nullable();
            $table->dateTime('date_of_publication')->nullable();
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
