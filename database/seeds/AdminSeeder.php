<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
         'name'=> 'heba',
         'email'=> 'heba2491990@gmail.com',
         'password'=> bcrypt('12345678')

        ]);
    }
}
