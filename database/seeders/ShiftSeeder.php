<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shifts = [
            [
                'title' => 'General',
                'time' => 'morning',
            ],
            [
                'title' => 'A',
                'time' => 'morning',
            ],
            [
                'title' => 'B',
                'time' => 'morning',
            ],
            [
                'title' => 'C',
                'time' => 'afternoon',
            ],
        ];


        foreach($shifts as $shift){
            Shift::create($shift);
        }

    }
}
