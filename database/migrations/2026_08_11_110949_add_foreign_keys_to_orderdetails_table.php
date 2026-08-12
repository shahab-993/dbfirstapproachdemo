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
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->foreign(['OrderID'], 'orderdetails_ibfk_1')->references(['OrderID'])->on('orders')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ProductID'], 'orderdetails_ibfk_2')->references(['ProductID'])->on('products')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->dropForeign('orderdetails_ibfk_1');
            $table->dropForeign('orderdetails_ibfk_2');
        });
    }
};
