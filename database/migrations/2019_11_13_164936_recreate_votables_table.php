<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateVotablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('votables');

        Schema::create('votables', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('votable_id');
            $table->string('votable_type');
            $table->tinyInteger('vote')->comment('-1: down vote, 1: up vote');
            $table->timestamps();
            $table->unique(['user_id', 'votable_id', 'votable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votables');

        Schema::create('votable', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('votable_id');
            $table->string('votable_type');
            $table->tinyInteger('vote')->comment('-1: down vote, 1: up vote');
            $table->timestamps();
            $table->unique(['user_id', 'votable_id', 'votable_type']);
        });
    }
}
