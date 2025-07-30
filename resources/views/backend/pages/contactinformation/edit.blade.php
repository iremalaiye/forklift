@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Site Ayarları</h4>


                    @if ($errors && $errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('panel.contactinformation.update') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="phone">Telefon 1</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="form-control" placeholder="Telefon 1">
                        </div>

                        <div class="form-group">
                            <label for="phone2">Telefon 2</label>
                            <input type="text" id="phone2" name="phone2" value="{{ old('phone2', $settings['phone2'] ?? '') }}" class="form-control" placeholder="Telefon 2">
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="form-control" placeholder="E-posta">
                        </div>

                        <div class="form-group">
                            <label for="adres">Adres</label>
                            <textarea id="adres" name="adres" class="form-control" rows="4" placeholder="Adres">{{ old('adres', $settings['adres'] ?? '') }}</textarea>
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
