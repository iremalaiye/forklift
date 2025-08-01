<?php

namespace App\Providers;
use App\Models\SmtpSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        if (!app()->runningInConsole() && Schema::hasTable('smtp_settings')) {
            $smtp = SmtpSetting::first();
            if ($smtp) {
                Config::set('mail.default', $smtp->mail_mailer ?? 'smtp');
                Config::set('mail.mailers.smtp.transport', $smtp->mail_mailer ?? 'smtp');
                Config::set('mail.mailers.smtp.host', $smtp->mail_host);
                Config::set('mail.mailers.smtp.port', $smtp->mail_port);
                Config::set('mail.mailers.smtp.username', $smtp->mail_username);
                Config::set('mail.mailers.smtp.password', $smtp->mail_password);
                Config::set('mail.mailers.smtp.encryption', $smtp->mail_scheme);
                Config::set('mail.from.address', $smtp->mail_from_address);
                Config::set('mail.from.name', $smtp->mail_from_name);
            }
        }
    }
}
