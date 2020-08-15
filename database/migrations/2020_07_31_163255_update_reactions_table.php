<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reactions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->change();
            $table->dropForeign(['idea_id']);
            $table->foreign('idea_id')
                  ->references('id')
                  ->on('ideas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->change();
            $table->dropForeign(['travel_id']);
            $table->foreign('travel_id')
                  ->references('id')
                  ->on('travels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reactions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->change();
            $table->dropForeign(['idea_id']);
            $table->foreign('idea_id')
                  ->references('id')
                  ->on('ideas')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->change();
            $table->dropForeign(['travel_id']);
            $table->foreign('travel_id')
                  ->references('id')
                  ->on('travels')
                  ->onDelete('retrict')
                  ->onUpdate('retrict')
                  ->change();
        });
    }
}
