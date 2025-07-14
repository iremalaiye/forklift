<?php

namespace Database\Seeders;
use App\Models\Slider;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image' =>'https://fatihistif.com/wp-content/uploads/2024/11/how-forklift-works-hec-scaled-1.jpg',
            'name'=>'PROFESYONEL FORKLİFT ÇÖZÜMLERİ',
            'content'=>'KENDİ KURTARICIMIZ VE FORKLİFTİMİZLE KÜTAHYANIN HER NOKTASINA
EN KALİTELİ FORKLİFT HİZMETLERİNİ SUNUYORUZ',
            'link'=>'urunler',
            'status'=>'1'
        ]);
    }
}
