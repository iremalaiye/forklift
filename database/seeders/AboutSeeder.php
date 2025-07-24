<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'image'=> 'https://www.ozismak.com/wp-content/uploads/2022/06/smz-lg30dt-dizel-forklift.webp',
            'name'=> "Kütahya'da forklift hizmeti",
            'content' =>"Kütahya Forklift Hizmetleri olarak, şehrin her noktasına 7/24 kesintisiz forklift çözümleri sunuyoruz. Yüksek kapasiteli makinelerimiz, bakımlı ve modern ekipmanlarımız ile en zorlu yükleri bile güvenle taşıyoruz. Deneyimli operatör kadromuzla işlerinizi zamanında, sorunsuz ve profesyonelce tamamlıyoruz.
    Müşteri memnuniyetini her şeyin önünde tutan anlayışımızla, şeffaf fiyat politikası, güler yüzlü hizmet ve güvenilir çözümler sunuyoruz. Bugüne kadar yüzlerce müşterimizin tercih ettiği firmamız, iş güvenliği standartlarına uygun çalışma prensibiyle Kütahya’da fark yaratmaktadır.
    İster acil bir ihtiyaçta, ister planlı taşımacılık süreçlerinizde… Biz buradayız.
    Çünkü yükünüzü sadece taşımıyor, sorumluluğunu da alıyoruz.",

        ]);
    }
}
