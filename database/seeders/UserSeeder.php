<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    $users =  User::create([
            "name" => "Eka Saputra",
            "password" => Hash::make('0500830272'),
            "card_number" => "0500830272",
            "email" => "eka@gmail.com"
    ]);

    $users->assignRole('users');

    $users2 =  User::create([
        "name" => "users",
        "password" => Hash::make('users123'),
        "card_number" => "userss",
        "email" => "users@gmail.com"
    ]);

    $users2->assignRole('users');

    $admin =  User::create([

        "name" => "admin",
        "password" => Hash::make('admin123'),
        "card_number" => "0612896657",
        "email" => "admin@gmail.com"

    ]);

    $admin->assignRole('admin');


    }
}
