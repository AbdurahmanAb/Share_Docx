<?php

namespace Database\Seeders\Traits;
use Illuminate\Support\Facades\DB;

trait EnableForeignKey{
    protected function EnableFk(): void
    {
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
        # code...
    }
}