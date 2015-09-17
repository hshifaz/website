<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentFilesServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_content_file', function(Blueprint $table){
            $table->integer('content_file_id')->unsigned();
            $table->foreign('content_file_id')->references('id')->on('content_files');

            $table->integer('career_id')->unsigned();
            $table->foreign('career_id')->references('id')->on('careers');

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
        Schema::drop('career_content_file');
    }
}
