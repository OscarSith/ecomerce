<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    (new \App\User([
	        'nombre' => 'ADMINISTRADOR',
	        'ruc' => '12345678901',
	        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
	        'direccion' => '',
	        'rol' => 'ADMIN',
	        'correo' => ''
        ]))->save();

	    factory(\App\User::class, 1)->create();
    }
}
