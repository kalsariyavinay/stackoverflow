<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobposts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title',255);
            $table->string('company_name',255);
            $table->string('logo',200);
            $table->string('location',200);
            $table->string('hrcontact',255);
            $table->string('website',255);
            $table->string('is_featured')->default(1);
            $table->string('location',255);
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
        Schema::dropIfExists('jobposts');
    }
}
