<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ideas_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ideas_id');
            $table->foreign('ideas_id')
                  ->references('id')
                  ->on('ideas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')
                  ->references('id')
                  ->on('media')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('ideas_media');
    }
}
