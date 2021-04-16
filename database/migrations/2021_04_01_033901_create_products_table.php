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
            $table->id();
            $table->string('thumbnail');
            $table->string('title');
            $table->longText('content');
            $table->string('priceType');
            $table->string('price')->default('0');

            $table->unsignedBigInteger('serverID');
            $table->foreign('serverID')->references('id')->on('server_games');

            $table->unsignedBigInteger('likeViewID');
            $table->foreign('likeViewID')->references('id')->on('like_views')->onDelete('cascade');

            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
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
