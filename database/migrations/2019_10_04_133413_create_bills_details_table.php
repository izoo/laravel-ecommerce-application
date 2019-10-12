<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('description');
            $table->string('ref_no');
            $table->integer('total_cost');
            $table->integer('balance');
            $table->integer('amount_paid');
            $table->integer('vat');
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
        Schema::dropIfExists('bills_details');
    }
}
