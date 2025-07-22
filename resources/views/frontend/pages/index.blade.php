@extends('frontend.layout.layout')
@section ('content')

    <div class="site-blocks-cover" style="background-image: url({{asset($slider->image)}});" data-aos="fade">
        <div class="container">
            <div style="background-color: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2 text-white">{{$slider->name??__('Merhaba')}}</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4 text-white">{{$slider->content??''}} </p>
                        <p>
                            <a href="{{url('/').'/'.$slider->link}}" class="btn btn-sm btn-warning">Hizmetlerimiz</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start" >
                        <span class="{{$about->text_1_icon}}" ></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{$about->text_1}}</h2>
                        <p>{{$about->text_1_content}} </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="{{$about->text_2_icon}}" ></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{$about->text_2}}</h2>
                        <p>{{$about->text_2_content}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="{{$about->text_3_icon}}" ></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{$about->text_3}}</h2>
                        <p> {{$about->text_3_content}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>






    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Hizmetlerimiz</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($products as $product)
                            <div class="item">
                                <a href="{{ route('urundetay', $product->slug) }}" class="text-decoration-none text-dark">
                                    <div class="block-4 text-center shadow-sm" style="transition: 0.3s;">
                                        <figure class="block-4-image mb-0">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->model }}" class="img-fluid" style="height: 300px; object-fit: cover;">
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3 class="text-danger">{{ $product->model }}</h3>
                                            <p class="text-danger font-weight-bold">{{ $product->capacity }}</p>
                                            <p class="mb-0">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
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




@endsection
