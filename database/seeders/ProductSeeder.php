<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'model'=> 'dizel forklift',
            'capacity' =>'3500 kg',
            'content'=>'Her türlü zor şartta görevini tam anlamıyla yerine getirmek için tasarlanmıştır. Açık-petek/plaka-kanat radyatör, motor ve şanzımanın en ağır koşullarda en fazla soğutmasını sağlar.',
            'image'=>'https://www.altermakmakine.com/upload/pages/1000x1000/hserisi1.jpg',
            'status'=>'1',
            'title' => '',
            'description' => '',
            'keywords' => '',
        ]);

        Product::create([
            'model'=> 'akülü forklift',
            'capacity' =>'5000 kg',
            'content'=>' Üç teker, dolgu lastikli, operatörün oturarak çalıştığı kaldırıcı.',
            'image'=>'https://www.unturkiye.com/wp-content/uploads/2021/11/unlithiumionforklift-768x512.jpg',
            'status'=>'1',
            'title' => '',
            'description' => '',
            'keywords' => '',

        ]);
    }
}
