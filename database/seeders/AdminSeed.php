<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Dave Olson',
        	'email' => 'david.g.olson.91@gmail.com',
        	'password' => bcrypt('Coffee123!@#'),
        ]);
    }
}
