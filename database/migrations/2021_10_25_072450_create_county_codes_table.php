<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountyCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('county_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name',25);
            $table->string('prefix',25);
            $table->timestamps();
        }); 
        Schema::rename('county_codes','country_codes');

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('county_codes');
    }
}
