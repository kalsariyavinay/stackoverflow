<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vots', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('question_id');
            $table->string('answer_id');
            $table->string('best_answer_id');
            $table->string('status');
            $table->string('type');
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
        Schema::dropIfExists('vots');
 
    }

    public function mark()
    {
    Schema::table('vots', function (Blueprint $table) {
        $table->enum('best_answer_id', ['approved', 'not approved'])->default('not approved');
    });}



}
