<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFKconstraintsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('job_title_id')->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_status_id')->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_role_id')->change();
        });
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
             $table->foreign('country_id')->references('id')->on('country_codes')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('user_status_id')->references('id')->on('user_status')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('user_role_id')->references('id')->on('user_role')->onDelete('cascade')->onUpdate('cascade');
 
         });
         Schema::table('user_tech_mappings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('tech_id')->references('id')->on('tech_stacks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['job_title_id']);
            $table->dropForeign(['user_status_id']);
            $table->dropForeign(['user_role_id']);
        });
        Schema::table('user_tech_mappings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['tech_id']);
       });
    }
}
