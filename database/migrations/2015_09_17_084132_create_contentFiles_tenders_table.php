<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentFilesTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_file_tender', function(Blueprint $table){
            $table->integer('content_file_id')->unsigned();
            $table->foreign('content_file_id')->references('id')->on('content_files');

            $table->integer('tender_id')->unsigned();
            $table->foreign('tender_id')->references('id')->on('tenders');

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
        Schema::drop('content_file_tenders');
    }
}
