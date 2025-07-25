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
            'status' => '1',
            'text' => 'Güvenilir Hizmet',
            'content' => 'Tüm forklift ihtiyaçlarınızda zamanında ve güvenli çözümler sunuyoruz. İşinizi aksatmadan yükünüzü taşıyoruz.',

        ]);


        Services::create([
            'status' => '1',
            'text' => 'Bakımlı ve Modern Ekipman',
            'content' => 'Tüm forkliftler düzenli bakımdan geçirilir ve iş sağlığına uygundur. En yüksek verimle çalışır.',

        ]);

        Services::create([
            'status' => '1',
            'text' => 'Kütahya Geneli Hizmet',
            'content' => 'Kütahya’nın her noktasına, hızlı ve ulaşılabilir forklift çözümleri sunuyoruz. Nerede olursanız olun, yanınızdayız.',

        ]);
    }
}
