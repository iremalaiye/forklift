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
                        @foreach($services as $service)
                            <div class="item">
                                <div class="block-4 text-center shadow-sm" style="height:350px;transition: 0.3s;">
                                    <figure class="block-4-image mb-0"><br>
                                        <i class="fa fa-truck fa-2x" style="color: #ffc107;"></i>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h2 class="text-uppercase text-dark">{{$service->text?? "" }}</h2>
                                        <p class="text-dark">{{$service->content?? ""}} </p>
                                    </div>
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
