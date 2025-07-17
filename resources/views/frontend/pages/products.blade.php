@extends('frontend.layout.layout')
@section ('content')
    <body>




        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Ürünler</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-md-9 order-2">

                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                                <div class="d-flex">
                                    <div class="dropdown mr-1 ml-md-auto">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Latest
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                            <a class="dropdown-item" href="#">Men</a>
                                            <a class="dropdown-item" href="#">Women</a>
                                            <a class="dropdown-item" href="#">Children</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sırala</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">

                                            <a class="dropdown-item" href="#">Name, A to Z</a>
                                            <a class="dropdown-item" href="#">Name, Z to A</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
@if(!empty($products)&& $products->count()>0)
     @foreach($products as $product)

                                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                            <div class="block-4 text-center border">
                                                <figure class="block-4-image">
                                                    <a href="{{route('urundetay',$product->slug)}}"><img src="{{asset($product->image)}}" alt="Image placeholder" class="img-fluid"></a>
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
@endsection
