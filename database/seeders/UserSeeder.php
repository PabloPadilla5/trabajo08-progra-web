<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo Alexis Padilla Maldonado',
            'email' => 'pablo@gmail.com',
            'password' => bcrypt('1234')
        ]);

        User::factory(9)->create();
    }
}
