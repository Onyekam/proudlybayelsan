<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformAreaOfBusiness extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_area_of_business', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('area_of_business');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_area_of_business');
    }
}
