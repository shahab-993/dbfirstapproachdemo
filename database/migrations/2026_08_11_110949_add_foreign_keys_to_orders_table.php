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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['EmployeeID'], 'orders_ibfk_1')->references(['EmployeeID'])->on('employees')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['CustomerID'], 'orders_ibfk_2')->references(['CustomerID'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ShipperID'], 'orders_ibfk_3')->references(['ShipperID'])->on('shippers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_ibfk_1');
            $table->dropForeign('orders_ibfk_2');
            $table->dropForeign('orders_ibfk_3');
        });
    }
};
