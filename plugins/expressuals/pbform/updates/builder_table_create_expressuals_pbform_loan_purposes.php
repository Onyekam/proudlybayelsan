<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformLoanPurposes extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_loan_purposes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('purpose_of_loan');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_loan_purposes');
    }
}
