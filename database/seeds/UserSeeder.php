<?php

use Dsc\Role;
use Dsc\Support\Enum\UserStatus;
use Dsc\User;



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
      //  $admin = Role::where('name', 'Admin')->first();
        //User::truncate();
        User::create([
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => '123456',
            'avatar' => null,
            'country_id' => null,
             'status' => UserStatus::ACTIVE
        ]);
    }
}
