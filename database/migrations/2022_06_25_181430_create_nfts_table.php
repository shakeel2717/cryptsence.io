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
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->integer('price');
            $table->integer('profit');
            $table->integer('duration');
            $table->boolean('status')->default(1);
            $table->integer('stock');
            $table->string('nft');
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
        Schema::dropIfExists('nfts');
    }
};
