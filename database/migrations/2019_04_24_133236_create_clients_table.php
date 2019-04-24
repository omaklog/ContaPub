<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('satPassword');
            $table->string('fielPassword');
            $table->date('vencimientoFiel');
            $table->date('fechaPemex');
            $table->string('assitePassword');
            $table->enum('tipoContrato',['Transitorio','Jubilado','Planta','Otro']);
            $table->integer('movil');
            $table->string('notas');

//            $table->integer('domicilio_id');
////            $table->foreign('domicilio_id')
////                ->references('id')->on('users')
////                ->onDelete('cascade');

            $table->unsignedInteger('domicilio_id')->unsigned();

//            $table->foreign('domicilio_id')->references('id')->on('domicilios');

            $table->timestamps();
        });
//        Schema::table('clients', function($table) {
//            $table->foreign('domicilio_id')->references('id')->on('domicilios');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
