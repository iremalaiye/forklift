@extends('frontend.layout.layout')
@section ('content')

    <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item @if($key == 0) active @endif">
                    <div class="site-blocks-cover" style="background-image: url({{ asset($slider->image ?? '') }}); font-family: 'Poppins', sans-serif;" data-aos="fade">
                        <div class="container">
                            <div style="background-color: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
                            <div class="row align-items-start align-items-md-center justify-content-end">
                                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                                    <h1 class="mb-2 text-white">{{ $slider->name ?? 'Merhaba' }}</h1>
                                    <div class="intro-text text-center text-md-left">
                                        <p class="mb-4 text-white">{{ $slider->content ?? '' }}</p>

                                        @php
                                            $routes = [
                                              '/' => url('/'),
                                              'hakkimizda' => url('/hakkimizda'),
                                              'urunler' => url('/urunler'),
                                              'iletisim' => url('/iletisim'),
                                            ];
                                            $sliderLink = $slider->link ?? 'urunler';
                                            $buttonUrl = $routes[$sliderLink] ?? url('/');
                                            $buttonText = match ($sliderLink) {
                                                '/' => 'Anasayfa',
                                                'hakkimizda' => 'Hakkımızda',
                                                'urunler' => 'HİZMETLERİMİZ',
                                                'iletisim' => 'İLETİŞİM',
                                                default => 'Hizmetlerimiz'
                                            };
                                        @endphp

                                        <p><a href="{{ $buttonUrl }}" class="btn btn-sm btn-warning">{{ $buttonText }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Slider Control buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>




    <div class="site-section block-3 site-blocks-2 bg-light py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 text-center">
                    <h2>Hizmetlerimiz</h2>
                    <hr class="w-25 mx-auto my-3" style="border-top: 2px solid #fbbf24;">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($services as $service)
                            <div class="item px-2">
                                <div class="block-4 text-center shadow rounded bg-white h-100 d-flex flex-column justify-content-center align-items-center p-4" style="transition: 0.3s ease-in-out; min-height: 350px;">
                                    <div class="icon mb-3">
                                        <i class="fa fa-truck fa-3x text-dark"></i>
                                    </div>
                                    <h3 class="text-uppercase text-warning mb-2" style="font-weight: bold;">{{ $service->text ?? "" }}</h3>
                                    <p class="text-muted">{{ $service->content ?? "" }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Forkliftlerimiz</h2>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($products as $product)
                            <div class="item">
                                <a href="{{ route('urundetay', $product->slug) }}" class="text-decoration-none text-dark">
                                    <div class="block-4 text-center shadow-sm" style="height:500px;transition: 0.3s;">
                                        <figure class="block-4-image mb-0">
                                            <img src="{{ asset($product->image??"") }}" alt="{{ $product->model }}" class="img-fluid" style="height: 300px; object-fit: cover;">
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3 class="text-danger">{{ $product->model }}</h3>
                                            <p class="text-danger font-weight-bold">{{ $product->capacity }}</p>
                                            <p class="mb-0">{{ \Illuminate\Support\Str::limit($product->content, 60) }}</p>
                                          </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

<style>
    .block-4:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        z-index: 10;
    }
</style>


@endsection
