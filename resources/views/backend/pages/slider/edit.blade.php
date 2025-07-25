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
                    <h4 class="card-title">Anasayfa</h4>

                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>

                        @endforeach
                    @endif

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif


                    @if(!empty($slider->id))
                        @php
                            $routelink =route('panel.slider.update',$slider->id);
                        @endphp
                    @else
                        @php
                            $routelink = route('panel.slider.store')
                        @endphp
                    @endif

                    <form action="{{ $routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">

                        @csrf
                        @if(!empty($slider->id))
                            @method('PUT')
                        @endif



                        {{-- Existing Image --}}
                        @if(isset($slider) && $slider->image)
                            <div class="form-group position-relative" style="display: inline-block; cursor: pointer; width: 400px; height: 300px;">
                                <img id="clickable-image" src="{{ asset($slider->image) }}" alt="Slider Resmi" width="400" height="300" style="display: block; border-radius: 4px;">

                                <div class="image-overlay">
                                    Değiştir
                                </div>

                                <input type="file" name="image" class="file-upload-default" id="imageInput" style="display: none;">
                            </div>
                        @else

                            <div class="form-group">
                                <label for="image">Resim Yükle</label>
                                <input type="file" name="image" id="imageInput" class="form-control" required>
                            </div>
                        @endif



                        <div class="form-group">
                            <label for="name">Başlık</label>
                            <input type="text" class="form-control" id="name" name ="name" value="{{$slider->name ?? ''}}"placeholder="Anasayfa Başlık">
                        </div>

                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <textarea  class="form-control" id="slogan" name ="content" placeholder="Slider Slogan" rows="3"> {!!$slider->content ?? ''  !!}</textarea>
                        </div>



                        <div class="form-group">
                            <label for="link">Yönlendirmek İstediğiniz Sayfa</label>
                            <select class="form-control" id="link" name="link">

                                    <option value="/">Anasayfa</option>
                                    <option value="hakkimizda">Hakkımızda</option>
                                    <option value="urunler">Hizmetlerimiz</option>
                                    <option value="iletisim">İletişim</option>
                                </select>
                            </select>
                        </div>





                        <div class="form-group">
                            <label for="durum">Durum</label>
                            @php
                                $status= $slider->status ?? '1';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="0"{{$status=='0' ? 'selected': ''}}>Pasif</option>
                                <option value="1"{{$status=='1' ? 'selected': ''}}  >Aktif</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
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
