<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformPr extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_pr', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('register_id');
            $table->integer('loan_purpose_id');
            $table->primary(['register_id','loan_purpose_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_pr');
    }
}
