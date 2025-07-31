@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">İletişim Formu Etiketleri</h4>

                    @if ($errors && $errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('panel.contactlabels.update') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="form_title">Form Başlığı</label>
                            <input type="text" id="form_title" name="form_title" value="{{ old('form_title', $label->form_title ?? '') }}" class="form-control" placeholder="Form Başlığı">
                        </div>

                        <div class="form-group">
                            <label for="name_label">İsim Etiketi</label>
                            <input type="text" id="name_label" name="name_label" value="{{ old('name_label', $label->name_label ?? '') }}" class="form-control" placeholder="İsim Etiketi">
                        </div>

                        <div class="form-group">
                            <label for="surname_label">Soyisim Etiketi</label>
                            <input type="text" id="surname_label" name="surname_label" value="{{ old('surname_label', $label->surname_label ?? '') }}" class="form-control" placeholder="Soyisim Etiketi">
                        </div>

                        <div class="form-group">
                            <label for="email_label">Email Etiketi</label>
                            <input type="text" id="email_label" name="email_label" value="{{ old('email_label', $label->email_label ?? '') }}" class="form-control" placeholder="Email Etiketi">
                        </div>

                        <div class="form-group">
                            <label for="subject_label">Konu Etiketi</label>
                            <input type="text" id="subject_label" name="subject_label" value="{{ old('subject_label', $label->subject_label ?? '') }}" class="form-control" placeholder="Konu Etiketi">
                        </div>

                        <div class="form-group">
                            <label for="message_label">Mesaj Etiketi</label>
                            <input type="text" id="message_label" name="message_label" value="{{ old('message_label', $label->message_label ?? '') }}" class="form-control" placeholder="Mesaj Etiketi">
                        </div>

                        <div class="form-group">
                            <label for="submit_button_label">Gönder Butonu Yazısı</label>
                            <input type="text" id="submit_button_label" name="submit_button_label" value="{{ old('submit_button_label', $label->submit_button_label ?? '') }}" class="form-control" placeholder="Gönder Butonu Yazısı">
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
