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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('ProductID', true);
            $table->string('ProductName', 50)->nullable();
            $table->integer('SupplierID')->nullable()->index('supplierid');
            $table->integer('CategoryID')->nullable()->index('categoryid');
            $table->string('Unit', 25)->nullable();
            $table->decimal('Price', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
