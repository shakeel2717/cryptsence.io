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
        Schema::table('users', function (Blueprint $table) {
            $table->text("address0")->nullable()->after("refer");
            $table->text("address1")->nullable()->after("refer");
            $table->text("address2")->nullable()->after("refer");
            $table->text("address3")->nullable()->after("refer");
            $table->text("address4")->nullable()->after("refer");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
