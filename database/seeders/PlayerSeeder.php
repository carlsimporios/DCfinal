<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            [
                'player_name' => 'Justine Bajenting',
                'college' => 'MDC',
                'birthdate' => date('Y-m-d', strtotime('July 30, 2002')),
                'position' => ' Point Guard',
                'draft_year' => ' 2014',
            ],
            [
                'player_name' => 'Mico Polinga',
                'college' => 'Stanford University',
                'birthdate' => date('Y-m-d', strtotime('July 30, 2003')),
                'position' => 'Dog style',
                'draft_year' => '2015',
            ],
            [
                'player_name' => 'Mcvincent Cifra',
                'college' => 'Oxford University',
                'birthdate' => date('Y-m-d', strtotime('July 30, 2004')),
                'position' => 'Cowgirl',
                'draft_year' => '2020',
            ],
            [
                'player_name' => 'John Gabriel',
                'college' => 'University of the Philippines',
                'birthdate' => date('Y-m-d', strtotime('July 30, 2005')),
                'position' => 'sixthynayn',
                'draft_year' => '2023',
            ],
            [
                'player_name' => 'Francis Asna',
                'college' => 'MaterDei COllege',
                'birthdate' => date('Y-m-d', strtotime('July 30, 2007')),
                'position' => 'Center',
                'draft_year' => '2020',
            ],
        ];

        foreach ($players as $player) {
            DB::table('players')->insert($player);

        }
    }
}
