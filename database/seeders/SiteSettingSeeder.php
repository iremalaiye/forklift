<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'adres',
            'data'=> 'Kütahya, Türkiye',
        ]);
        SiteSetting::create([
            'name' => 'phone',
            'data'=> '+90 543 722 16 44',
        ]);
        SiteSetting::create([
            'name' => 'phone2',
            'data'=> '+90 540 313 43 43',
        ]);
        SiteSetting::create([
            'name' => 'email',
            'data'=> 'info@forkliftkutahya.com',
        ]);
        SiteSetting::create([
            'name' => 'harita',
            'data'=> 'null',
        ]);
        SiteSetting::Create(
            ['name' => 'twitter_adres'],
            ['data' => '@twitteradres']
        );
    }
}
