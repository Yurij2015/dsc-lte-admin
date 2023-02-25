<?php

namespace Database\Seeders;

use App\Models\CompanyCustomer;
use Illuminate\Database\Seeder;

class CompanyCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyCustomer::factory(11000)->create();
    }
}
