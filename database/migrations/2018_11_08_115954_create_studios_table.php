<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('studio_name');
            $table->string('studio_info');
            $table->string('studio_addrs');
            $table->integer('studio_contact');
            $table->string('studio_website');
            $table->string('studio_city');
            $table->string('studio_country');
            $table->time('studio_opening_time');
            $table->time('studio_closing_time');
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
        Schema::dropIfExists('studios');
    }
}
