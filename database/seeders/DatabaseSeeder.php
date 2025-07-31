<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

     //   User::factory()->create([
        //    'name' => 'Test User',
           // 'email' => 'test@example.com',
       // ]);

    // all seeders mentioned here.
        $this->call([
            SliderSeeder::class,
            AboutSeeder::class,
            ContactInformationSeeder::class,
            ProductSeeder::class,
            ServicesSeeder::class,
            PageSeoSeeder::class,
            ContactLabelSeeder::class,
            ]);
    }
}
