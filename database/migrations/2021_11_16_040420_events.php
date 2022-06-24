<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')
                ->unique();
            $table->string('picture');
            $table->string('form_link');
            $table->date('date');
            $table->longText('detail');
            $table->enum('region', array(
                'all_region', 
                'timtengka', 
                'amerop', 
                'asia_oseania'
            ));
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
        Schema::dropIfExists('events');
    }
}
