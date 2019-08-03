<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn13', 13);
            $table->string('title', 50);
            $table->string('author', 50);
            $table->string('illustrator', 50)->nullable();
            $table->string('publisher', 50);
            $table->date('publishedDate');
            $table->text('description');
            $table->string('thumbnail');
            $table->boolean('lending');
            $table->string('borrowingPerson', 50)->nullable();
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
        Schema::dropIfExists('books');
    }
}
