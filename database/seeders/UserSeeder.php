<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKey;
use Database\Seeders\Traits\EnableForeignKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    use TruncateTable;
    use EnableForeignKey;
    use DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->DisableFk();
     $this->truncate('users');
        //to remove repteation of data we truncate the table first
        \App\Models\User::factory(10)->create();
        //
      $this->EnableFk();
    }
}
