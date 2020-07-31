<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->text('from');
            $table->text('to');
            $table->unsignedBigInteger('transport_type_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
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
