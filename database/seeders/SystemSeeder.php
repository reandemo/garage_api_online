<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tbl_systems as System;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $system = new System();
        $system->name = 'Café Shop';
        $system->status = 'DEV';
        $system->inputter = 'IT.SYTEM';
        $system->isactive=true;
        $system->save();

        $system = new System();
        $system->name = 'POS Inventory';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();

        $system = new System();
        $system->name = 'Garage Management';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();

        $system = new System();
        $system->name = 'Real Estate';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();
                
        $system = new System();
        $system->name = 'Hospital Management';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();

        $system = new System();
        $system->name = 'Sømnøng Management';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();

        $system = new System();
        $system->name = 'Resørt Management';
        $system->status = 'DEV';
        $system->isactive=true;
        $system->inputter = 'IT.SYTEM';
        $system->save();

    }
}
