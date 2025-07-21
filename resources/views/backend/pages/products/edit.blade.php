@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($product) ? 'Ürünü Düzenle' : 'Yeni Ürün Ekle' }}</h4>

                    {{-- error --}}
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {{-- success message --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Form action --}}
                    @php
                        $route = isset($product)
                            ? route('panel.products.update', $product->id)
                            : route('panel.products.store');
                    @endphp

                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        {{-- Existing Image --}}
                        @if(isset($product) && $product->image)
                            <div class="form-group">
                                <label>Mevcut Resim</label><br>
                                <img src="{{ asset($product->image) }}" alt="Ürün Resmi" width="400" height="300">
                            </div>
                        @endif

                        {{-- Image Upload --}}
                        <div class="form-group">
                            <label>Resim</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Resim yükle">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Gözat</button>
                            </span>
                            </div>
                        </div>

                        {{-- Model --}}
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" id="model" name="model" class="form-control" value="{{ $product->model ?? old('model') }}" placeholder="Model adı" required>
                        </div>

                        {{-- capacity --}}
                        <div class="form-group">
                            <label for="capacity">Kapasite</label>
                            <input type="text" id="capacity" name="capacity" class="form-control" value="{{ $product->capacity ?? old('capacity') }}" placeholder="Kapasite">
                        </div>

                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Ürün açıklaması">{{ $product->description ?? old('description') }}</textarea>
                        </div>

                        {{-- status --}}
                        <div class="form-group">
                            <label for="status">Durum</label>
                            @php $status = $product->status ?? '1'; @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Pasif</option>
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">{{ isset($product) ? 'Güncelle' : 'Kaydet' }}</button>
                        <a href="{{ route('panel.products.index') }}" class="btn btn-light">İptal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
