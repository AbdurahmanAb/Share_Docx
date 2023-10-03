<?php

namespace Database\Seeders\Traits;
use Illuminate\Support\Facades\DB;

trait DisableForeignKey{
    protected function DisableFk(): void
    {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
        # code...
    }
}