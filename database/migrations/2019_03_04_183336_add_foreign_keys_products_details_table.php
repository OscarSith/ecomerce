<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productsDetails', function (Blueprint $table) {
            $table->foreign('id_producto')
	            ->references('id')
	            ->on('products');

	        $table->foreign('id_venta')
		        ->references('id')
		        ->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productsDetails', function (Blueprint $table) {
            $table->dropForeign('productsDetails_id_producto_foreign');
            $table->dropForeign('productsDetails_id_venta_foreign');
        });
    }
}
