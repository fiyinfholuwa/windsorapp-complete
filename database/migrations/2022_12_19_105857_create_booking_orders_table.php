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
        Schema::create('booking_orders', function (Blueprint $table) {
            $table->id();
            $table->string('bookingId');
            $table->string('checkIn');
            $table->string('checkOut');
            $table->string('guest');
            $table->string('user_email');
            $table->integer('apartment_id');
            $table->string('price');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('reference');
            $table->integer('admin_delete')->default(0);
            $table->integer('time_up')->default(0);
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
        Schema::dropIfExists('booking_orders');
    }
};
