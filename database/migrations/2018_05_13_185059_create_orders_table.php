<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_mail')->nullable();
            $table->string('c_name')->nullable();
            $table->string('c_address')->nullable();
            $table->string('c_state')->nullable();
            $table->string('c_city')->nullable();
            $table->string('c_country')->nullable();
            $table->string('c_zip')->nullable();
            $table->float('total_price')->nullable();
            $table->enum('status',['initializing','canceled','payed','processing','ready to deliver','delivering','delivered']);
            $table->boolean('by_admin')->default(false);
            $table->text('description')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
