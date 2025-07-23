@extends('backend.layout.app')

@section('content')
    <div class="row">
        <style>
            .form-group.position-relative {
                position: relative;
            }
            .image-overlay {
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 18px;
                opacity: 0;
                border-radius: 4px;
                transition: opacity 0.3s ease;
                pointer-events: none;
                user-select: none;
            }
            .form-group.position-relative:hover .image-overlay {
                opacity: 1;
                pointer-events: auto;
            }
        </style>

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
                            <div class="form-group position-relative" style="display: inline-block; cursor: pointer; width: 400px; height: 300px;">
                                <img id="clickable-image" src="{{ asset($product->image) }}" alt="Ürün Resmi" width="400" height="300" style="display: block; border-radius: 4px;">

                                <div class="image-overlay">
                                    Değiştir
                                </div>

                                <input type="file" name="image" class="file-upload-default" id="imageInput" style="display: none;">
                            </div>
                        @else
                            {{-- Yeni ürün için normal dosya inputu --}}
                            <div class="form-group">
                                <label for="image">Resim Yükle</label>
                                <input type="file" name="image" id="imageInput" class="form-control" required>
                            </div>
                        @endif


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
@section('customjs')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const image = document.getElementById("clickable-image");
            const overlay = document.querySelector(".image-overlay");
            const input = document.getElementById("imageInput");

            if (input) {
                if (image) {
                    image.addEventListener("click", () => input.click());
                }
                if (overlay) {
                    overlay.addEventListener("click", () => input.click());
                }

                input.addEventListener("change", () => {
                    const fileName = input.files[0]?.name;
                    if (fileName) {
                        const displayInput = document.querySelector(".file-upload-info");
                        if (displayInput) displayInput.value = fileName;
                    }
                });
            }
        });


    </script>
@endsection
