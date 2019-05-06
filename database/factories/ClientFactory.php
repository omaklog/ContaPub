<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
            'nombre' => $faker->name,
            'rfc' => $faker->swiftBicNumber,
            'satPassword' => $faker->text($maxNbChars = 20),
            'fielPassword' => $faker->text($maxNbChars = 20),
            'assitePassword' => $faker->text($maxNbChars = 20),
            'vencimientoFiel' => $faker->date('Y-m-d', 'now'),
            'fechaPemex' => $faker->date('Y-m-d', 'now'),
            'tipoContrato' => $faker->randomElement(['Transitorio','Jubilado','Planta','Otro']),
            'movil' => $faker->numberBetween(9510000000, 9519999999),
            'notas' => $faker->text($maxNbChars = 200),
            'domicilio_id' => null,
    ];
});
