<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BranchStore as Branch;
use App\Models\tbl_systems as System;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $system = System::first();
        
        $branch = new Branch();
        $branch->branchcode = '0101';
        $branch->subofbranch = '0001';
        $branch->short_name = 'CODING';
        $branch->main_branch = '1';
        $branch->slogan = 'Building software today that solves problems tomorrow';
        $branch->branch_name = 'REAN-Programming Co., Ltd';
        $branch->system_id = '1';
        $branch->active = '1';
        $branch->save();

        $branch = new Branch();
        $branch->branchcode = '0201';
        $branch->subofbranch = '0002';
        $branch->short_name = 'TC';
        $branch->main_branch = '0';
        $branch->slogan = 'Trust the hands that understand your vehicle.';
        $branch->branch_name = 'TC AUTO';
        $branch->phone = '010 322 022';
        $branch->address = 'Phnom penh they Sen Sok';
        $branch->system_id = '2';
        $branch->active = '1';
        $branch->save();

        $branch = new Branch();
        $branch->branchcode = '0301';
        $branch->subofbranch = '0003';
        $branch->short_name = 'SAVADA';
        $branch->main_branch = '0';
        $branch->slogan = 'Arrive as a guest, leave as family.';
        $branch->branch_name = 'Savada Resort Kep Thmey';
        $branch->phone = '010 322 022';
        $branch->address = 'Bokor National Park, Kep Thmey, Cambodia';
        $branch->system_id = '3';
        $branch->active = '1';
        $branch->save();
    }
}
