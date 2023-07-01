<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("order_number");
            $table->string("customar_name");
            $table->string("customar_number");
            $table->string("customar_email");
            $table->string("adresse");
            $table->date("delivery_date");
            $table->string("delivery_time");
            $table->string("branch");
            $table->string("payement_methode");
            $table->string("category");
            $table->string("sub_categorie");
            $table->string("product");
            $table->decimal("product_price");
            $table->integer("qty");
            $table->decimal("total");
            $table->integer("statue");
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
};
