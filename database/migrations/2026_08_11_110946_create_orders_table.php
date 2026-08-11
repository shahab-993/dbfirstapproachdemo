<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('OrderID', true);
            $table->integer('CustomerID')->nullable()->index('customerid');
            $table->integer('EmployeeID')->nullable()->index('employeeid');
            $table->dateTime('OrderDate')->nullable();
            $table->integer('ShipperID')->nullable()->index('shipperid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
