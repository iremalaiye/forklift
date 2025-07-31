<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInformation::create([
            'name' => 'adres',
            'data'=> 'Kütahya, Türkiye',
        ]);
        ContactInformation::create([
            'name' => 'phone',
            'data'=> '+90 543 722 16 44',
        ]);
        ContactInformation::create([
            'name' => 'phone2',
            'data'=> '+90 540 313 43 43',
        ]);
        ContactInformation::create([
            'name' => 'email',
            'data'=> 'info@forkliftkutahya.com',
        ]);
        ContactInformation::create([
            'name' => 'harita',
            'data'=> 'null',
        ]);
        ContactInformation::Create(
            ['name' => 'twitter_adres'],
            ['data' => '@twitteradres']
        );
    }
}
