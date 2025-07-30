<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageSeo;

class PageSeoSeeder extends Seeder
{
    public function run(): void
    {
        PageSeo::create([
            'dil' => 'tr',
            'page' => 'anasayfa',
            'page_ust' => null,
            'title' => 'Kütahya Forklift Anasayfa',
            'description' => 'Kütahya Forklift Description',
            'keywords' => 'Kütahya, Forklift, Taşımacılık',
            'contents' => 'Kütahya Forklift Contents',
        ]);

        PageSeo::create([
            'dil' => 'tr',
            'page' => 'urunler',
            'page_ust' => null,
            'title' => 'Kütahya Forklift Ürünler',
            'description' => 'Kütahya Forklift Ürünler Description',
            'keywords' => 'Forklift, Ürünler, Kütahya',
            'contents' => 'Kütahya Forklift Ürünler Contents',
        ]);

        PageSeo::create([
            'dil' => 'tr',
            'page' => 'hakkimizda',
            'page_ust' => null,
            'title' => 'Hakkımızda',
            'description' => 'Hakkımızda Description',
            'keywords' => 'Hakkımızda, Firma, Bilgi',
            'contents' => 'Hakkımızda Contents',
        ]);

        PageSeo::create([
            'dil' => 'tr',
            'page' => 'iletisim',
            'page_ust' => null,
            'title' => 'İletişim',
            'description' => 'İletişim Description',
            'keywords' => 'İletişim, Adres, Telefon',
            'contents' => 'İletişim Contents',
        ]);
    }
}
