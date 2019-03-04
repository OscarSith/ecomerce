<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('brands')->insert(['brand_name' => 'Acer']);
	    DB::table('brands')->insert(['brand_name' => 'HP']);
	    DB::table('brands')->insert(['brand_name' => 'Toshiba']);
	    DB::table('brands')->insert(['brand_name' => 'Azus']);
	    DB::table('brands')->insert(['brand_name' => 'AMD']);
	    DB::table('brands')->insert(['brand_name' => 'CANON']);
	    DB::table('brands')->insert(['brand_name' => 'DELL']);
	    DB::table('brands')->insert(['brand_name' => 'Epson']);
	    DB::table('brands')->insert(['brand_name' => 'Lenovo']);
    }
}
