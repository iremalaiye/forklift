@extends('frontend.layout.layout')
@section ('content')
    <body>




        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Hizmetlerimiz</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-md-9 order-2">

                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left mb-4"><h2 class="text-black h5">Hizmetlerimiz</h2></div>

                        </div>
                        <div class="row mb-5" >
@if(!empty($products)&& $products->count()>0)
     @foreach($products as $product)

                                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                            <div class="block-4 text-center border">
                                                <figure class="block-4-image">
                                                    <a href="{{route('urundetay',$product->slug)}}"><img src="{{asset($product->image)}}" alt="Image placeholder" class="img-fluid rounded"></a>
                                                </figure>
                                                <div class="block-4-text p-4">
                                                    <h3><a href="{{route('urundetay',$product->slug)}}">{{($product->model)}}</a></h3>
                                                    <p class="mb-0">{{($product->description)}}</p>
                                                    <p class="text-primary font-weight-bold">{{($product->capacity)}}</p>
                                                </div>
                                            </div>
                                        </div>
     @endforeach
@endif



                        </div>
                        <div class="row" data-aos="fade-up">
                            {{$products->links('vendor.pagination.custom' )}}
                            {{-- <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <ul>
                                        <li><a href="#">&lt;</a></li>
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&gt;</a></li>
                                    </ul>
                                </div>
                            </div>--}}
                        </div>
                    </div>


                </div>

            </div>
        </div>
            <style>
                .block-4 {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }

                .block-4-image {
                    flex-shrink: 0;
                }

                .block-4-text {
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    padding: 1rem;
                }

                .block-4-image img {
                    height: 250px;
                    object-fit: cover;
                    width: 100%;
                }
            </style>

@endsection
