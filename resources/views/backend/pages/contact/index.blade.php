@extends('backend.layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Gelen Mesajlar</h4>

                    <form action="{{ route('panel.email.save') }}" method="POST">
                        @csrf
                        <label for="admin_email">Admin Mail Adresi:</label>
                        <input type="email" name="admin_email" id="admin_email" value="{{ old('admin_email', $adminEmail ?? '') }}" required>
                        <button type="submit">Kaydet</button>
                    </form>

                    <a href="{{ route('panel.smtp_settings.edit') }}">
                        <button type="button">SMTP Settings</button>
                    </a><br> <br>


                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif



                    <div class="table-responsive">
                        <br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Email</th>
                                <th>Konu</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($contacts) && $contacts->count() > 0)
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject ?? '-' }}</td>
                                        <td>{{ $contact->created_at->format('d.m.Y H:i') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('panel.contacts.show', $contact->id) }}" class="btn btn-sm btn-warning mr-2">Detay</a>

                                            <form action="{{ route('panel.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Mesaj silinecek, emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Mesaj bulunmamaktadır.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
