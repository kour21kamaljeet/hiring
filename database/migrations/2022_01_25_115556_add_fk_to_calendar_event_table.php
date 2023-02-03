<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToCalendarEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calendar_event', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });
        Schema::disableForeignKeyConstraints();
        Schema::table('calendar_event', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendar_event', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
