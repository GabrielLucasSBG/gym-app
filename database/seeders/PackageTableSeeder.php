<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Monthly package',
            'amount' => 1000,
            'number_of_days' => 30,
            'status' => 'active',
        ]);

        Package::create([
            'name' => 'Half yearly package',
            'amount' => 5000,
            'number_of_days' => 180,
            'status' => 'active',
        ]);

        Package::create([
            'name' => 'Yearly package',
            'amount' => 10000,
            'number_of_days' => 365,
            'status' => 'active',
        ]);
    }
}
