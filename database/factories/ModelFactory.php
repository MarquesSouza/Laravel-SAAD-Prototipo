<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\Core::class, function (Faker\Generator $faker){
    return [
        'status' => $faker->boolean,
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'matricula' => $faker->numberBetween(1,3),
    ];
});

$factory->define(App\Entities\TypeUser::class, function (Faker\Generator $faker) {


    return [
        'status' => $faker->boolean,
        'nome' => $faker->sentence,
        'descricao' => $faker->sentence,
    ];
});
$factory->define(App\Entities\TypeActivity::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
    ];
});
$factory->define(App\Entities\Modality::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
    ];
});
$factory->define(App\Entities\Ambient::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
    ];
});
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'password' => $password ?: $password = bcrypt('secret'),
        'matricula'  => $faker->unique()->numberBetween(1,999999999),
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
        'status' => $faker->boolean,
        'id_cores' => $faker->numberBetween(1,10),

    ];
});
$factory->define(App\Entities\RDC::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
        'periodo_inicio' =>$faker->dateTime(),
        'periodo_conclusao' =>$faker->dateTime(),
    ];
});
$factory->define(App\Entities\PPC::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
        'id_modalidade' =>$faker->numberBetween(1,3),
    ];
});
$factory->define(App\Entities\Activity::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
        'carga_horaria'=> $faker->numberBetween(1,100),
        'carga_horaria_anual' => $faker->numberBetween(1,100),
        'carga_horaria_semanal'=> $faker->numberBetween(1,100),
        'ambiente_recomendado' => $faker->sentence,
        'ambiente_eventual'=> $faker->sentence,
        'fator_mutiplicador'=> $faker->numberBetween(1,100),
        'id_typeActivity' => $faker->numberBetween(1,10),
        'id_nucleo' => $faker->numberBetween(1,10),
        'id_ambientes'=> $faker->numberBetween(1,10),
    ];
});
$factory->define(App\Entities\UserTypeUser::class, function (Faker\Generator $faker) {


    return [
        'id_user' => $faker->numberBetween(1,3),
        'id_type_user' => $faker->numberBetween(1,2),
        'status' => $faker->boolean,
    ];
});

$factory->define(App\Entities\ActivityPCC::class, function (Faker\Generator $faker) {
    return [
        'id_activity' => $faker->numberBetween(1,3),
        'id_ppc' => $faker->numberBetween(1,2),
        'status' => $faker->boolean,
        'periodo' => $faker->numberBetween(1,10),
    ];
});

$factory->define(App\Entities\Allocation::class, function (Faker\Generator $faker) {
    return [
        'id_user' => $faker->numberBetween(1,3),
        'id_rdc' => $faker->numberBetween(1,2),
        'status' => $faker->boolean,
        'carga_horaria_minima'=> $faker->numberBetween(1,100),
        'carga_horaria_maxima'=> $faker-> numberBetween(1,100),
    ];
});

$factory->define(App\Entities\Task::class, function (Faker\Generator $faker) {


    return [
        'id_activity' => $faker->numberBetween(1,3),
        'id_allocation' => $faker->numberBetween(1,2),
        'id_rdc' => $faker->numberBetween(1,2),
        'status' => $faker->boolean,
    ];
});