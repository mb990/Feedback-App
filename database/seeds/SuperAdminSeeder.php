<?php

use App\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = new User();

        $superadmin->first_name = 'my name is';
        $superadmin->last_name = 'mister so mighty buahahaha';
        $superadmin->email = 'superadmin@feedback-app.com';
        $superadmin->email_verified_at = now();
        $superadmin->password = Hash::make('superadmin');
        $superadmin->remember_token = Str::random(10);

        $superadmin->save();

        $superadmin->assignRole('superadmin');
    }
}
