<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['cat_nombre' => 'Impresoras']);
        DB::table('categories')->insert(['cat_nombre' => 'Computadoras']);
        DB::table('categories')->insert(['cat_nombre' => 'Laptops']);
        DB::table('categories')->insert(['cat_nombre' => 'Servidores']);
        DB::table('categories')->insert(['cat_nombre' => 'Monitores']);
    }
}
