<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@hotmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('admin')
        ]);
        \App\Models\User::factory(3)->create();
    }
}
