@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">SMTP Ayarları</h4>

                    {{-- error--}}
                    @if ($errors && $errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {{-- success --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('panel.smtp_settings.update') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="mail_mailer">Mail Mailer</label>
                            <input type="text" id="mail_mailer" name="mail_mailer" value="{{ old('mail_mailer', $settings->mail_mailer ?? 'smtp') }}" class="form-control" placeholder="smtp, log, ses vb.">
                        </div>

                        <div class="form-group">
                            <label for="mail_scheme">Mail Scheme (Encryption)</label>
                            <input type="text" id="mail_scheme" name="mail_scheme" value="{{ old('mail_scheme', $settings->mail_scheme ?? '') }}" class="form-control" placeholder="tls, ssl veya boş bırakabilirsiniz">
                        </div>

                        <div class="form-group">
                            <label for="mail_host">Mail Host</label>
                            <input type="text" id="mail_host" name="mail_host" value="{{ old('mail_host', $settings->mail_host ?? '') }}" class="form-control" placeholder="smtp.gmail.com, smtp.mailtrap.io vb.">
                        </div>

                        <div class="form-group">
                            <label for="mail_port">Mail Port</label>
                            <input type="number" id="mail_port" name="mail_port" value="{{ old('mail_port', $settings->mail_port ?? '') }}" class="form-control" placeholder="587, 465, 2525 vb.">
                        </div>

                        <div class="form-group">
                            <label for="mail_username">Mail Username</label>
                            <input type="text" id="mail_username" name="mail_username" value="{{ old('mail_username', $settings->mail_username ?? '') }}" class="form-control" placeholder="E-posta adresi">
                        </div>

                        <div class="form-group">
                            <label for="mail_password">Mail Password</label>
                            <input type="password" id="mail_password" name="mail_password" value="{{ old('mail_password', $settings->mail_password ?? '') }}" class="form-control" placeholder="Şifreniz">
                        </div>

                        <div class="form-group">
                            <label for="mail_from_address">Mail From Address</label>
                            <input type="email" id="mail_from_address" name="mail_from_address" value="{{ old('mail_from_address', $settings->mail_from_address ?? '') }}" class="form-control" placeholder="Gönderici e-posta adresi">
                        </div>

                        <div class="form-group">
                            <label for="mail_from_name">Mail From Name</label>
                            <input type="text" id="mail_from_name" name="mail_from_name" value="{{ old('mail_from_name', $settings->mail_from_name ?? '') }}" class="form-control" placeholder="Gönderici adı">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">
                            <i class="fas fa-save me-1"></i> Güncelle
                        </button>
                        <a href="{{ route('panel.dashboard.index') }}" class="btn btn-light">İptal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
