<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id('tr_id');
            $table->biginteger('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('type', 10);
            $table->date('tr_date');
            $table->string('category', 20);
            $table->string('description', 255);
            $table->decimal('tr_amount', $precision = 19, $scale = 2);
            $table->string('invoice', 255)->nullable();
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
        Schema::dropIfExists('cashflows');
    }
}
