<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('total')->default(0);
            $table->enum('status', ['created', 'paid', 'completed'])->default('created');
            $table->enum('method_of_payment', ['visa', 'mastercard', 'paypal'])->nullable();
            $table->dateTime('money_transferred_at')->nullable();
            $table->dateTime('diagram_submitted_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
