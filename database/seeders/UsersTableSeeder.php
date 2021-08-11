<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        User::create([
            'name' => 'teste',
            'email' => 'teste@q.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
