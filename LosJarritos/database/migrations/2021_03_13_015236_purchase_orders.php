<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseOrders', function (Blueprint $table) {
            $table->bigIncrements('idOrder');
            $table->bigInteger('idVendor');
            $table->bigInteger('idProduct');
            $table->date('date');
            $table->string('foli');
            $table->text('comments');
            $table->string('status')->default('Pendiente');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseOrders');
    }
}
