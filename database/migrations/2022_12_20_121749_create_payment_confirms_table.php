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
        Schema::create('payment_confirms', function (Blueprint $table) {
            $table->id();
            $table->string('bookingId');
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('amount_sent');
            $table->string('email');
            $table->string('full_name');
            $table->string('verify_status')->default('pending');
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
        Schema::dropIfExists('payment_confirms');
    }
};
