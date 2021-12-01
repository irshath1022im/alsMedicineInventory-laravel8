<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('batch_number');
            $table->unsignedBigInteger('item_id');
            $table->date('expiry_date');
            $table->integer('initial_qty')->nullable();
            $table->string('barcode')->nullable();
            $table->string('status')->default('active');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('batch_numbers');
    }
}
