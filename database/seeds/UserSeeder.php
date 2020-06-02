<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $customerRole = Role::where('name', 'customer')->first();
        $sellerRole = Role::where('name', 'seller')->first();

        $superAdmin = User::create([
            'full_name' => 'Super Admin',
            'email' => 'sa@gmail.com',
            'mobile_number' => '01898376541',
            'password' => Hash::make('sa@gmail.com'),
            'admin' => 1,
            'verification_token'=> str_shuffle(Str::random(32))
        ]);

        $admin = User::create([
            'full_name' => 'Admin User',
            'email' => 'a@gmail.com',
            'mobile_number' => '01891876141',
            'password' => Hash::make('a@gmail.com'),
            'admin' => 1,
            'verification_token'=> str_shuffle(Str::random(32))
        ]);

        $customer = User::create([
            'full_name' => 'Customer User',
            'email' => 'c@gmail.com',
            'mobile_number' => '01898876541',
            'password' => Hash::make('c@gmail.com'),
            'verification_token'=> str_shuffle(Str::random(32))
        ]);

        $seller = User::create([
            'full_name' => 'Seller User',
            'email' => 's@gmail.com',
            'mobile_number' => '01878876541',
            'password' => Hash::make('s@gmail.com'),
            'verification_token'=> str_shuffle(Str::random(32))
        ]);
        /*Assigning user Role*/
        $superAdmin->roles()->attach($superAdminRole);
        $admin->roles()->attach($adminRole);
        $customer->roles()->attach($customerRole);
        $seller->roles()->attach($sellerRole);
    }
}
