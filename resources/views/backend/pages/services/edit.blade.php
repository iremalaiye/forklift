
@extends('backend.layout.app')
@section('content')


    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hizmetlerimiz Düzenle</h4>


                    {{-- error --}}
                    @if($errors && $errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    {{-- success message --}}
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
<form action="{{ route('panel.services.update', $services->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
@csrf
@method('PUT')

    <h5>İkon Bilgileri</h5>

    {{-- 1. icon --}}
    <div class="form-row">
        <div class="col">
            <label>1. İkon</label>
            <input type="text" name="text_1_icon" class="form-control" value="{{ $services->text_1_icon }}">
        </div>
        <div class="col">
            <label>1. Başlık</label>
            <input type="text" name="text_1" class="form-control" value="{{ $services->text_1 }}">
        </div>
    </div>
    <div class="form-group mt-2">
        <label>1. İçerik</label>
        <textarea name="text_1_content" class="form-control" rows="2">{{ $services->text_1_content }}</textarea>
    </div>

    {{-- 2. icon --}}
    <div class="form-row">
        <div class="col">
            <label>2. İkon</label>
            <input type="text" name="text_2_icon" class="form-control" value="{{ $services->text_2_icon }}">
        </div>
        <div class="col">
            <label>2. Başlık</label>
            <input type="text" name="text_2" class="form-control" value="{{ $services->text_2 }}">
        </div>
    </div>
    <div class="form-group mt-2">
        <label>2. İçerik</label>
        <textarea name="text_2_content" class="form-control" rows="2">{{ $services->text_2_content }}</textarea>
    </div>

    {{-- 3. icon --}}
    <div class="form-row">
        <div class="col">
            <label>3. İkon</label>
            <input type="text" name="text_3_icon" class="form-control" value="{{ $services->text_3_icon }}">
        </div>
        <div class="col">
            <label>3. Başlık</label>
            <input type="text" name="text_3" class="form-control" value="{{ $services->text_3 }}">
        </div>
    </div>
    <div class="form-group mt-2">
        <label>3. İçerik</label>
        <textarea name="text_3_content" class="form-control" rows="2">{{ $services->text_3_content }}</textarea>
    </div>

    {{-- Buttons--}}
    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
    <a href="{{ route('panel.services.index') }}" class="btn btn-light">İptal</a>
</form>
                </div>
            </div>
        </div>
    </div>
@endsection
