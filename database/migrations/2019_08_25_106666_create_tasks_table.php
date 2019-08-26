<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('type', ['bug', 'story']);
            $table->longText('description');
            $table->integer('story_point')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->unsignedBigInteger('column_id')->nullable();
            $table->unsignedBigInteger('sprint_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('assignee_id')->references('id')->on('users');
            $table->foreign('column_id')->references('id')->on('board_columns');
            $table->foreign('sprint_id')->references('id')->on('sprints');
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
        Schema::dropIfExists('tasks');
    }
}
