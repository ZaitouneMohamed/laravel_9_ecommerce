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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug", 191)->unique();
            $table->text("description");
            $table->decimal("price", 8, 2)->default(0);
            $table->decimal("old_price", 8, 2)->default(0);
            $table->bigInteger("sub_categorie_id")->unsigned();
            $table->foreign("sub_categorie_id")->references("id")->on("sub_categories")->onDelete("cascade");
            $table->integer("active")->default(0);
            $table->integer("prenium")->default(0);
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
};
