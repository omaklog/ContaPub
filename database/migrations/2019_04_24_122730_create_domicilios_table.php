<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->unsignedInteger('id',true);

            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->unsignedInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');

            $table->unsignedInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');


            $table->string('nombre_vialidad');


            $table->string('nombre_asentamiento');

            $table->string('numero_exterior')->nullable();;
            $table->string('numero_interior')->nullable();;
            $table->string('codigo_postal')->nullable();;

           // $table->bigIncrements('user_id');
           // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('domicilios');
    }
}
