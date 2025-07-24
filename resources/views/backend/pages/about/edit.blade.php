@extends('backend.layout.app')
@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hakkımızda Düzenle</h4>

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

                    <form action="{{ route('panel.about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')

                        {{-- Image--}}
                        <div class="form-group">
                            <label>Mevcut Görsel: </label>
                            <div class="input-group col-xs-12 mb-2">
                                @if($about->image)
                                    <img src="{{ asset($about->image) }}" width="300" height="200" class="img-fluid">
                                @endif
                            </div>
                        </div>

                        {{-- Add image--}}
                        <div class="form-group">
                            <label>Görsel</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Görsel yükle">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">Başlık</label>
                            <input type="text" name="name" class="form-control" value="{{ $about->name }}" placeholder="Başlık">
                        </div>

                        {{-- content--}}
                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea name="content" class="form-control" rows="6" placeholder="İçerik">{{ $about->content }}</textarea>
                        </div>

                        <hr>

                        {{-- Buttons--}}
                        <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                        <a href="{{ route('panel.about.index') }}" class="btn btn-light">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
