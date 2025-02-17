<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            DocumentSeeder::class,
            OrderSeeder::class,
            VoucherSeeder::class,
            PurchaseRequestSeeder::class,
            PurchaseOrderSeeder::class,
            RouteSlipSeeder::class,
        ]);
    }
}
