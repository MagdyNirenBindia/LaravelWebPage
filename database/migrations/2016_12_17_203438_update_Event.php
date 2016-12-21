<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event',function($newcolumn){
          $newcolumn -> integer('Ticket_Capacity');
        });
        Schema::table('event',function($newcolumn2){
          $newcolumn2 -> string('Creator');
        });
        Schema::table('event',function($newcolumn3){
          $newcolumn3 -> string('CreatorID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('event',function($newcolumn){
        $newcolumn -> dropcolumn('Ticket_Capacity');
      });
      Schema::table('event',function($newcolumn2){
        $newcolumn2 -> dropcolumn('Creator');
      });
      Schema::table('event',function($newcolumn3){
        $newcolumn3 -> dropcolumn('CreatorID');
      });

    }
}
