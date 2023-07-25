<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin2',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12341234')
        ])->assignRole('Admin');

        User::factory(9)->create();
    }

}