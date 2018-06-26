<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateExpressualsPbformRegister2 extends Migration
{
    public function up()
    {
        Schema::table('expressuals_pbform_register', function($table)
        {
            $table->dropColumn('purpose_of_loan');
        });
    }
    
    public function down()
    {
        Schema::table('expressuals_pbform_register', function($table)
        {
            $table->string('purpose_of_loan', 255);
        });
    }
}
