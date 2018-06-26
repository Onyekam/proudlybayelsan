<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformLga extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_lga', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('lga');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_lga');
    }
}
