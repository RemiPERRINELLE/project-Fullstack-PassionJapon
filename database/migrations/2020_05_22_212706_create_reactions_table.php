<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('note');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->unsignedBigInteger('idea_id')->nullable();
            $table->foreign('idea_id')
                ->references('id')
                ->on('ideas')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('travel_id')->nullable();
            $table->foreign('travel_id')
                    ->references('id')
                    ->on('travels')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
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
        Schema::dropIfExists('reactions');
    }
}
