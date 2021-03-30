<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status')->default(1);
            $table->foreignId('type');
            $table->float('total', 8, 2);
            $table->float('amount_paid', 8, 2)->default(0.00);
            $table->float('amount_unpaid', 8, 2);
            $table->float('inherited_value', 8, 2)->default(0.00);
            $table->date('date_paid')->nullable();
            $table->integer('year');
            $table->foreignId('month');
            $table->string('boleto_code')->nullable();

            $table->foreign('status')->references('id')->on('status');
            $table->foreign('type')->references('id')->on('debit_type');
            $table->foreign('month')->references('id')->on('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debit');
    }
}
