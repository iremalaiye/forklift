<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactLabel;
class ContactLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactLabel::create([
            'form_title' => 'İletişim',
            'name_label' => 'Adınız',
            'surname_label' => 'Soyadınız',
            'email_label' => 'E-posta Adresiniz',
            'subject_label' => 'Konu',
            'message_label' => 'Mesajınız',
            'submit_button_label' => 'Gönder',
        ]);
    }
}
