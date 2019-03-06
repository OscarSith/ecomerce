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
	    DB::table('brands')->insert(['brand_name' => 'Acer', 'brand_imagen' => 'acer.gif']);
	    DB::table('brands')->insert(['brand_name' => 'HP', 'brand_imagen' => 'hp-invent.gif']);
	    DB::table('brands')->insert(['brand_name' => 'Toshiba', 'brand_imagen' => 'toshiba.gif']);
	    DB::table('brands')->insert(['brand_name' => 'Asus', 'brand_imagen' => 'asus.gif']);
	    DB::table('brands')->insert(['brand_name' => 'AMD', 'brand_imagen' => 'amd.gif']);
	    DB::table('brands')->insert(['brand_name' => 'CANON', 'brand_imagen' => 'canon.gif']);
	    DB::table('brands')->insert(['brand_name' => 'DELL', 'brand_imagen' => 'dell.gif']);
	    DB::table('brands')->insert(['brand_name' => 'Epson', 'brand_imagen' => 'epson.gif']);
	    DB::table('brands')->insert(['brand_name' => 'Lenovo', 'brand_imagen' => 'lenovo.gif']);
    }
}
