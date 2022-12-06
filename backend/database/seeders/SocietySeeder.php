<?php

namespace Database\Seeders;

use App\Models\Society;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Society::create([
            'id_card_number' => '240703085',
            'password' => Hash::make('password'),
            'name' => 'Sri Indah Martini',
            'born_date' => now()->subCenturies(13),
            'gender' => 'female',
            'address' => 'Jln. wiyung utara gang anggrek no.4',
            'regional_id' => 3,
        ]);
        Society::create([
            'id_card_number' => '280102085',
            'password' => Hash::make('password'),
            'name' => 'Rosalina Dewi Anggarita',
            'born_date' => now()->subCenturies(14),
            'gender' => 'female',
            'address' => 'Perum. Griya Indah Blok.H/27',
            'regional_id' => 4,
        ]);
        Society::create([
            'id_card_number' => '142701089',
            'password' => Hash::make('password'),
            'name' => 'Bagus Prawicaksono',
            'born_date' => now()->subCenturies(12),
            'gender' => 'male',
            'address' => 'Jln. bandung bergelombang gang mangga no.4',
            'regional_id' => 7,
        ]);
        Society::create([
            'id_card_number' => '220113088',
            'password' => Hash::make('password'),
            'name' => 'Bambang Restu',
            'born_date' => now()->subCenturies(10),
            'gender' => 'male',
            'address' => 'Jln. jombang beriman',
            'regional_id' => 5,
        ]);
    }
}
