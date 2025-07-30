@extends('backend.layout.app')

@section('content')
    <div class="container mt-4">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4><i class="fas fa-cogs"></i> İletişim Bilgileri</h4>
            <a href="{{ route('panel.contactinformation.edit') }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> İletişim Bilgilerini Düzenle
            </a>
        </div>


        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <tr>
                        <th >Telefon 1</th>
                        <td>{{ $settings['phone'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Telefon 2</th>
                        <td>{{ $settings['phone2'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $settings['email'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Adres</th>
                        <td>{{ $settings['adres'] ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
@endsection
