<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BranchesSeeder;
use Database\Seeders\SystemSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'user_id' => 'USER001',
            'user_login' => 'JOINCODER',
            'email' => 'JOINCODER@joincoder.com',
            'branchcode' => 'BRANCH001',
            'profile_id' => 'PROFILE001',
            'active' => true,
            'inputter' => 'JOINCODER',
            'password'=>'$2y$12$t/2s3Cf/6SYIMX6gyl.cxutnUBrJTOoirZ8fG3QuJQnHdliH7Pt6q',

        ]);

        \App\Models\User::factory()->create([
            'user_id' => 'USER002',
            'branchcode' => '0002',
            'user_login' => 'joincoder',
            'email' => 'joincoder@gmail.com',
            'profile_id' => '1',
            'active' => '1',
            'password'=>'$2y$12$t/2s3Cf/6SYIMX6gyl.cxutnUBrJTOoirZ8fG3QuJQnHdliH7Pt6q',
            'inputter' => 'IT.SYSTEM'
         ]);



        $this->call(SystemSeeder::class);
        $this->call(BranchesSeeder::class);

    }
}
