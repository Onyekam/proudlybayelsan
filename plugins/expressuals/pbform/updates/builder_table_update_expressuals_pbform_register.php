<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateExpressualsPbformRegister extends Migration
{
    public function up()
    {
        Schema::table('expressuals_pbform_register', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('expressuals_pbform_register', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->increments('id')->unsigned()->change();
        });
    }
}
