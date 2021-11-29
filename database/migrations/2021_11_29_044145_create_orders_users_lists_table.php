<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersUsersListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_users_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_users')->constrained();
            $table->foreignId("user_id")->constrained();
            $table->foreignId('product_id');
            $table->decimal('price');
            $table->integer('amount');
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
        Schema::dropIfExists('orders_users_lists');
    }
}
