<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tbl_systems as System;

class SystemSeeder extends Seeder
{
    public function run(): void
    {
        $systems = [
            [
                'system_id' => 'SYSTEM',
                'name' => 'IT System',
            ],
            [
                'system_id' => 'GARAGE',
                'name' => 'Garage Management',
            ],
            [
                'system_id' => 'RESORT',
                'name' => 'Resort Management',
            ],
            [
                'system_id' => 'HOSPITAL',
                'name' => 'Hospital Management',
            ],
            [
                'system_id' => 'COFFEE',
                'name' => 'Coffee Store Management',
            ],
        ];

        foreach ($systems as $item) {
            System::updateOrCreate(
                ['system_id' => $item['system_id']],
                [
                    'name' => $item['name'],
                    'status' => 'DEV',
                    'isactive' => true,
                    'inputter' => 'IT.SYSTEM',
                ]
            );
        }
    }
}