<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('id_categoria')->unsigned();
	        $table->integer('id_marca')->unsigned();
	        $table->string('prod_codigo');
	        $table->string('prod_nombre');
	        $table->string('prod_info');
	        $table->string('prod_imagen');
	        $table->text('prod_detalle');
	        $table->decimal('prod_precio', 6, 2);
            $table->integer('prod_stock');
            $table->boolean('prod_new')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('products');
    }
}
