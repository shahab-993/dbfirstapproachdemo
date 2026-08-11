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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('EmployeeID', true);
            $table->string('LastName', 15)->nullable();
            $table->string('FirstName', 15)->nullable();
            $table->dateTime('BirthDate')->nullable();
            $table->string('Photo', 25)->nullable();
            $table->string('Notes', 1024)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
