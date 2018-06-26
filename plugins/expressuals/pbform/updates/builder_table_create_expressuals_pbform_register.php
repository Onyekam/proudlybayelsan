<?php namespace Expressuals\Pbform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateExpressualsPbformRegister extends Migration
{
    public function up()
    {
        Schema::create('expressuals_pbform_register', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('surname');
            $table->string('other_names');
            $table->string('gender', 1);
            $table->string('telephone');
            $table->string('email');
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('address');
            $table->integer('lga_id');
            $table->integer('area_business_id');
            $table->integer('industry_id');
            $table->string('existed');
            $table->integer('registered');
            $table->string('cac_reg')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('bayelsa_state_id')->nullable();
            $table->string('purpose_of_loan');
            $table->text('business_description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('expressuals_pbform_register');
    }
}
