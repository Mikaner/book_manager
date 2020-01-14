<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rending', function (Blueprint $table) {
            $table->bigIncrements('rending_id');
            $table->bigInteger('user_id');
            $table->bigInteger('book_id');
            $table->boolean('rending_status');
            $table->text('rending_details')->nullable();
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
        Schema::dropIfExists('rending');
    }
}
