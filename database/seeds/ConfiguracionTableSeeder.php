<?php

use Illuminate\Database\Seeder;

class ConfiguracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('configuracion')->insert([
        	'nro_orden' => 1,
        	'nro_factura' => 1,
        	'razon' => 'Empresa E-Commerce',
        	'ruc' => '10000000001',
        	'direccion' => '795 Folsom Ave, Suite 600'
        ]);
    }
}
