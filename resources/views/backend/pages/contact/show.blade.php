@extends('backend.layout.app')
@section('content')

    <div class="container mt-4">
        <h4>Mesaj Detayı</h4>

        <div class="card p-3">
            <p><strong>İsim:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Konu:</strong> {{ $contact->subject ?? '-' }}</p>
            <p><strong>Mesaj:</strong></p>
            <p>{{ $contact->message ?? '-' }}</p>
            <p><strong>Gönderilme Tarihi:</strong> {{ $contact->created_at->format('d.m.Y H:i') }}</p>
        </div>

        <a href="{{ route('panel.contacts.index') }}" class="btn btn-secondary mt-3">Geri Dön</a>
    </div>

@endsection
