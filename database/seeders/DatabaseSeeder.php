<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Master Data
        $this->call([
            SystemSeeder::class,
            BranchesSeeder::class,
        ]);

        // System Administrator
        User::updateOrCreate(
            ['user_id' => 'USER001'],
            [
                'user_login' => 'JOINCODER',
                'email' => 'JOINCODER@gmail.com',
                'branchcode' => '0101',
                'profile_id' => 'ADMIN',
                'isactive' => true,
                'inputter' => 'IT.SYSTEM',
                'password' => Hash::make('ABCabc123$$'),
            ]
        );

        // Garage Administrator
        User::updateOrCreate(
            ['user_id' => 'USER002'],
            [
                'user_login' => 'GARAGE_ADMIN',
                'email' => 'garage@gmail.com',
                'branchcode' => '0201',
                'profile_id' => 'ADMIN',
                'isactive' => true,
                'inputter' => 'IT.SYSTEM',
                'password' => Hash::make('ABCabc123$$'),
            ]
        );

        // Coffee Administrator
        User::updateOrCreate(
            ['user_id' => 'USER003'],
            [
                'user_login' => 'COFFEE_ADMIN',
                'email' => 'coffee@gmail.com',
                'branchcode' => '0301',
                'profile_id' => 'ADMIN',
                'isactive' => true,
                'inputter' => 'IT.SYSTEM',
                'password' => Hash::make('ABCabc123$$'),
            ]
        );
    }
}