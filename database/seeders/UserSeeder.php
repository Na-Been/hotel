<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
          User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'super user',
                'password' => Hash::make('12345678'),
                'super' => '1'
            ]);

            // $role = Role::all();
            // $user->assignRole($role);
    }
}
