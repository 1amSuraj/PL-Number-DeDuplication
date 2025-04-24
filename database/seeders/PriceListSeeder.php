<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceList;

class PriceListSeeder extends Seeder
{
    public function run(): void
    {
        PriceList::insert([
            ['pl_number' => 'PL001'],
            ['pl_number' => 'PL001'],
            ['pl_number' => 'PL002'],
            ['pl_number' => 'PL002'],
            ['pl_number' => 'PL003'],
            ['pl_number' => 'PL004'],
            ['pl_number' => 'PL004'],
            ['pl_number' => 'PL004'],
        ]);
    }
}