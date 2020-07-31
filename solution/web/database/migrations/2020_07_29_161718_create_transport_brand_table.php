<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_brands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('transport_brands')->insert([
            ['title'=>'Northrop'],
            ['title'=>'DJI'],
            ['title'=>'Toyota'],
            ['title'=>'Airbus']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_brand');
    }
}
