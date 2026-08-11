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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('SupplierID', true);
            $table->string('SupplierName', 50)->nullable();
            $table->string('ContactName', 50)->nullable();
            $table->string('Address', 50)->nullable();
            $table->string('City', 20)->nullable();
            $table->string('PostalCode', 10)->nullable();
            $table->string('Country', 15)->nullable();
            $table->string('Phone', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
