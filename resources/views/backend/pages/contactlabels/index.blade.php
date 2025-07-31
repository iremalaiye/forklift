@extends('backend.layout.app')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4><i class="fas fa-tags"></i> İletişim Sayfası Etiketleri</h4>
            <a href="{{ route('panel.contactlabels.edit') }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Düzenle
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <tbody>
                    <tr>
                        <th>Form Başlığı</th>
                        <td>{{ $label->form_title ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>İsim</th>
                        <td>{{ $label->name_label ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Soyisim</th>
                        <td>{{ $label->surname_label ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $label->email_label ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Konu</th>
                        <td>{{ $label->subject_label ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Mesaj</th>
                        <td>{{ $label->message_label ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Gönder Butonu</th>
                        <td>{{ $label->submit_button_label ?? '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
