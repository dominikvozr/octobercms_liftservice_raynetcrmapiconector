<?php namespace Dondo\RaynetcrmApiConector\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoRaynetcrmapiconectorConfig extends Migration
{
    public function up()
    {
        Schema::create('dondo_raynetcrmapiconector_config', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('api_key', 50);
            $table->string('instance_name', 50);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dondo_raynetcrmapiconector_config');
    }
}
