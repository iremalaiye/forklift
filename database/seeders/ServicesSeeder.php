<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services;
class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Services::create([
            'text_1_icon'=>"icon-truck",
            'text_1'=>'Güvenilir Hizmet',
            'text_1_content'=>'Tüm forklift ihtiyaçlarınızda zamanında ve güvenli çözümler sunuyoruz. İşinizi aksatmadan yükünüzü taşıyoruz.',
            'text_2_icon'=>"icon-truck",
            'text_2'=>'Bakımlı ve Modern Ekipman',
            'text_2_content'=>'Tüm forkliftler düzenli bakımdan geçirilir ve iş sağlığına uygundur. En yüksek verimle çalışır.',
            'text_3_icon'=>"icon-truck",
            'text_3'=>'Kütahya Geneli Hizmet',
            'text_3_content'=>'Kütahya’nın her noktasına, hızlı ve ulaşılabilir forklift çözümleri sunuyoruz. Nerede olursanız olun, yanınızdayız.',
        ]);
    }
}
