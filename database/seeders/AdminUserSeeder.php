<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::create([
            'name' => 'Admin MIS',
            'phone' => '082214773030',
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@lpkia.ac.id',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt('admin'),
            'is_admin'=> true,
            'people_id' => People::inRandomOrder()->first()->id,
        ]);
    }
}
