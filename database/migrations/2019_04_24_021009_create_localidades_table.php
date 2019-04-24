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
			$table->string('clave', 4)->comment('CVE_LOC – Clave de la localidad');
			$table->string('nombre', 100)->comment('NOM_LOC – Nombre de la localidad');
			$table->string('latitud', 15)->comment('LATITUD – Latitud (en DMS)');
			$table->string('longitud', 15)->comment('LONGITUD – Longitud (en DMS)');
			$table->string('altitud', 15)->comment('ALTITUD – Altitud');
			$table->string('carta', 10)->comment('CVE_CARTA');
			$table->string('ambito', 1)->comment('AMBITO');
			$table->integer('poblacion')->comment('PTOT – Población Total');
			$table->integer('masculino')->comment('PMAS – Población Masculina');
			$table->integer('femenino')->comment('PFEM – Población Femenina');
			$table->integer('viviendas')->comment('VTOT – Número total de viviendas');
			$table->decimal('lat', 10, 7)->comment('Latitud en decimal');
			$table->decimal('lng', 10, 7)->comment('Longitud en decimal');
			$table->tinyinteger('activo')->default(1);
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
