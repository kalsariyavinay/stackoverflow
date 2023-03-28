<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_us', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('email',50);
            $table->string('phone_number',15);
            $table->string('msg_subject',500);
            $table->string('message',500);            
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
        Schema::dropIfExists('contacts_us');
    }
}
