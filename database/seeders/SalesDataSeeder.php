<?php

namespace Database\Seeders;

use App\Models\SalesData;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesDataSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        SalesData::insert( [
            [ 'month' => 'January', 'sales' => 100, 'created_at' => now(), 'updated_at' => now() ],
            [ 'month' => 'February', 'sales' => 150, 'created_at' => now(), 'updated_at' => now() ],
            [ 'month' => 'March', 'sales' => 200, 'created_at' => now(), 'updated_at' => now() ],
            [ 'month' => 'April', 'sales' => 250, 'created_at' => now(), 'updated_at' => now() ],
            [ 'month' => 'May', 'sales' => 300, 'created_at' => now(), 'updated_at' => now() ],
            [ 'month' => 'June', 'sales' => 350, 'created_at' => now(), 'updated_at' => now() ],
        ] );

    }
}
