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
        // User::factory(10)->create();

        User::factory()->create([
            'user_id' => 'USER001',
            'name' => 'JOINCODER',
            'email' => 'JOINCODER@joincoder.com',
            'branch_code' => 'BRANCH001',
            'profile_id' => 'PROFILE001',
            'active' => true,
            'sysdoc' => 'sysdoc001',
            'inputter' => 'JOINCODER',
            'password'=>'$2y$12$t/2s3Cf/6SYIMX6gyl.cxutnUBrJTOoirZ8fG3QuJQnHdliH7Pt6q',

        ]);

        \App\Models\User::factory()->create([
            'user_id' => 'USER002',
            'branch_code' => '0002',
            'name' => 'joincoder',
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
