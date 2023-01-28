<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Role::create([

        'name' => 'admin',
        'guard_name' => 'web'

        ]);

    Role::create([

        'name' => 'users',
        'guard_name' => 'web'

        ]);

    }
}
