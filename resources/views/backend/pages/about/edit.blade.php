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
                cursor: pointer;
            }
            .form-group.position-relative:hover .image-overlay {
                opacity: 1;
            }
        </style>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hakkımızda Düzenle</h4>

                    {{-- error --}}
                    @if($errors && $errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {{-- success message --}}
                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('panel.about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')

                        {{-- Existing Image with overlay --}}
                        @if($about->image)
                            <div class="form-group position-relative" style="width: 300px; height: 200px;">
                                <img id="clickable-image" src="{{ asset($about->image) }}" alt="Hakkımızda Görsel" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
                                <div class="image-overlay">Değiştir</div>
                                <input type="file" name="image" id="imageInput" style="display:none;">
                            </div>
                        @else
                            <div class="form-group">
                                <label>Görsel</label>
                                <input type="file" name="image" id="imageInput" class="form-control">
                            </div>
                        @endif

                        {{-- name --}}
                        <div class="form-group mt-3">
                            <label for="name">Başlık</label>
                            <input type="text" name="name" class="form-control" value="{{ $about->name }}" placeholder="Başlık">
                        </div>

                        {{-- content --}}
                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea name="content" class="form-control" rows="6" placeholder="İçerik">{{ $about->content }}</textarea>
                        </div>

                        <hr>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                        <a href="{{ route('panel.about.index') }}" class="btn btn-light">İptal</a>
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
            const input = document.getElementById("imageInput");

            if(image && input){
                image.addEventListener("click", () => input.click());
                document.querySelector('.image-overlay').addEventListener("click", () => input.click());

                input.addEventListener("change", () => {
                    if(input.files && input.files[0]){
                        const reader = new FileReader();
                        reader.onload = function(e){
                            image.src = e.target.result; // Önizleme için resmi değiştir
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                });
            }
        });
    </script>
@endsection
