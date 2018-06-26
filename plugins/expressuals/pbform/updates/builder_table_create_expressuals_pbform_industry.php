<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformIndustry extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_industry', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('industry');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_industry');
    }
}
