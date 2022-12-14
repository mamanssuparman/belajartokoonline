<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataseed = [
            'name'      => 'Maman Suparman',
            'email'     => 'mamanssuparman@gmail.com',
            'password'  => bcrypt('123456'),
            'roles'     => 'ADMIN',
            // 'nomor_telepon' => '0987'
        ];
        User::create($dataseed);
    }
}
