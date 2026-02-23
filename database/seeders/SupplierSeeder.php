<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {

        Supplier::truncate();

        $admin = User::where('permissions->superuser', '1')->first() ?? User::factory()->firstAdmin()->create();

        Supplier::factory()->count(5)->create();
        Supplier::factory()->count(1)->xssTestSupplier();
    }
}
