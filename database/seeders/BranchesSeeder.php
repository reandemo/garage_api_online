<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BranchStore as Branch;

class BranchesSeeder extends Seeder
{
    public function run(): void
    {
        Branch::updateOrCreate(
            ['branchcode' => '0101'],
            [
                'subofbranch' => '0001',
                'short_name' => 'COD',
                'main_branch' => true,
                'slogan' => 'Building software today that solves problems tomorrow',
                'branch_name' => 'REAN-Programming Co., Ltd',
                'system_id' => 'SYSTEM',
                'phone' => '010 12 88 005',
                'isactive' => true,
            ]
        );

        Branch::updateOrCreate(
            ['branchcode' => '0201'],
            [
                'subofbranch' => '0002',
                'short_name' => 'TC',
                'main_branch' => false,
                'slogan' => 'Trust the hands that understand your vehicle.',
                'branch_name' => 'TC AUTO',
                'phone' => '010 322 022',
                'address' => 'Phnom Penh, Sen Sok',
                'system_id' => 'GARAGE',
                'isactive' => true,
            ]
        );

        Branch::updateOrCreate(
            ['branchcode' => '0301'],
            [
                'subofbranch' => '0003',
                'short_name' => 'COFFEE',
                'main_branch' => false,
                'slogan' => 'Brewing Happiness in Every Cup.',
                'branch_name' => 'JOIN Coffee',
                'phone' => '010 322 022',
                'address' => 'Tek Vil, Kampot, Cambodia',
                'system_id' => 'COFFEE',
                'isactive' => true,
            ]
        );

        Branch::updateOrCreate(
            ['branchcode' => '0401'],
            [
                'subofbranch' => '0004',
                'short_name' => 'SAVADA',
                'main_branch' => false,
                'slogan' => 'Arrive as a guest, leave as family.',
                'branch_name' => 'SAVADA Kep Thmey',
                'phone' => '010 322 022',
                'address' => 'Bokor National Park, Kep thmey, Cambodia',
                'system_id' => 'RESORT',
                'isactive' => false,
            ]
        );
    }
}
