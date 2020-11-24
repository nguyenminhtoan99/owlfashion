<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->float('price');
            $table->float('discount')->nullabale();
            $table->string('size')->default('M')->nullable();
            $table->text('photo');
            $table->integer('quantity')->default(1);
            $table->enum('condition',['default','new','hot'])->default('default');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
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
