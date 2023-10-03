<?php

namespace Database\Seeders;

use App\Models\Comment;
use Database\Seeders\Traits\DisableForeignKey;
use Database\Seeders\Traits\EnableForeignKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{

    use TruncateTable, EnableForeignKey, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->DisableFk();
        $this->truncate('comments');
        Comment::factory(5)->create();
        $this->EnableFk();
        //
    }
}
