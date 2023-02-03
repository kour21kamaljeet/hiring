<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RearrangeColumnCreatedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            DB::statement("ALTER TABLE users MODIFY COLUMN created_at timestamp DEFAULT CURRENT_TIMESTAMP AFTER resume_id");
        
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
            DB::statement("ALTER TABLE users MODIFY COLUMN created_at timestamp DEFAULT CURRENT_TIMESTAMP");
      
    }
}
