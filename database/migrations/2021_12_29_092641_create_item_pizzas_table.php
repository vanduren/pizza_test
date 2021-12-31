<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pizza', function (Blueprint $table) {
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')
                  ->references('id')->on('items')
                  ->onDelete('cascade');
            $table->BigInteger('pizza_id')->unsigned();
            $table->foreign('pizza_id')
                  ->references('id')->on('pizzas')
                  ->onDelete('cascade');
            $table->primary(['item_id', 'pizza_id']);
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
        Schema::dropIfExists('item_pizza');
    }
}
