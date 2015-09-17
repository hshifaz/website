<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid_title');         //bid title
            $table->string('tender_no');         //tender no
            $table->date('pre_bid_date');   //pre Bid Date
            $table->date('open_bid_date');  //open bid date
            $table->date('post_date');      //post Date
            $table->date('remove_date');    //remove Date
            $table->string('attachment');        //link to the attachment
            $table->timestamps();                //timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tenders');
    }
}
