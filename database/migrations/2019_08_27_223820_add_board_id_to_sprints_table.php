<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoardIdToSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprints', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id')->nullable()->default(null);
            $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprints', function (Blueprint $table) {
            $table->removeColumn('board_id');
        });
    }
}
