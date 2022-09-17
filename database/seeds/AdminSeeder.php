<?php

use Illuminate\Database\Seeder;

class Aminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::insert([
            [
                'nama'=>'Admin',
                'email'=>'admin123@gmail.com',
                'password'=>bcrypt('123'),
            ],
        ]);
    }
}
