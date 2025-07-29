@extends('frontend.layout.layout')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Hakkımızda</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{$about->image??"images/blog_1.jpg"}}" alt="Image placeholder" class="img-fluid rounded">


                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">{{$about->name??""}}</h2>
                    </div>
                    <p>{!! $about->content ??""!!}</p>
                </div>
            </div>
        </div>
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

    <style>
        .block-4:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 10;
        }
    </style>


    @endsection
