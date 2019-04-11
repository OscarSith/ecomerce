<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'id_categoria' => $faker->numberBetween(1, 5),
        'id_marca' => $faker->numberBetween(1, 9),
        'prod_codigo' => $faker->randomNumber(8),
        'prod_nombre' => $faker->text(20),
        'prod_info' => $faker->text(60),
        'prod_imagen' => $faker->imageUrl(640, 480, 'technics'),
        'prod_detalle' => $faker->text(),
        'prod_precio' => $faker->numberBetween(10, 200) . '.' . $faker->randomNumber(2),
        'prod_stock' => $faker->numberBetween(2, 30)
    ];
});
