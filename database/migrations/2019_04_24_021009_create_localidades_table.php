<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localidades', function(Blueprint $table)
		{
			$table->unsignedInteger('id', true);
			$table->integer('municipio_id')->index('municipio_id')->comment('Relación: municipios -> id');
			$table->string('nombre', 100)->comment('NOM_LOC – Nombre de la localidad');
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('localidades');
	}

}
