• comment s'installe faker ?

composer require fakerphp/faker

• donnez un exemple de code pour générer une adresse américaine en utilisant faker

<?php
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
// 'walter'
echo $faker->email();
// 'walter.sophia@hotmail.com'
echo $faker->text();
// 'Numquam ut mollitia at consequuntur inventore dolorem.'

• formattez une date en type DateTime : "2017/02/16 (16:15)"

datetime.date('2017-02-16T16:15')