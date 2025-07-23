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
                        <h5>İkon Bilgileri</h5>

                        {{-- 1. icon --}}
                        <div class="form-row">
                            <div class="col">
                                <label>1. İkon</label>
                                <input type="text" name="text_1_icon" class="form-control" value="{{ $about->text_1_icon }}">
                            </div>
                            <div class="col">
                                <label>1. Başlık</label>
                                <input type="text" name="text_1" class="form-control" value="{{ $about->text_1 }}">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label>1. İçerik</label>
                            <textarea name="text_1_content" class="form-control" rows="2">{{ $about->text_1_content }}</textarea>
                        </div>

                        {{-- 2. icon --}}
                        <div class="form-row">
                            <div class="col">
                                <label>2. İkon</label>
                                <input type="text" name="text_2_icon" class="form-control" value="{{ $about->text_2_icon }}">
                            </div>
                            <div class="col">
                                <label>2. Başlık</label>
                                <input type="text" name="text_2" class="form-control" value="{{ $about->text_2 }}">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label>2. İçerik</label>
                            <textarea name="text_2_content" class="form-control" rows="2">{{ $about->text_2_content }}</textarea>
                        </div>

                        {{-- 3. icon --}}
                        <div class="form-row">
                            <div class="col">
                                <label>3. İkon</label>
                                <input type="text" name="text_3_icon" class="form-control" value="{{ $about->text_3_icon }}">
                            </div>
                            <div class="col">
                                <label>3. Başlık</label>
                                <input type="text" name="text_3" class="form-control" value="{{ $about->text_3 }}">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label>3. İçerik</label>
                            <textarea name="text_3_content" class="form-control" rows="2">{{ $about->text_3_content }}</textarea>
                        </div>

                        {{-- Buttons--}}
                        <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                        <a href="{{ route('panel.about.index') }}" class="btn btn-light">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
