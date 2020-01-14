<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_information', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->smallInteger('source_id');
            $table->string('title');
            $table->string('isbn10', 10)->nullable();
            $table->string('isbn13', 13)->nullable();
            $table->integer('publisher_id')->nullable();
            $table->date('published_date')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('books_information');
    }
}
