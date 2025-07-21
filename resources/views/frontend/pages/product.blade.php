@extends('frontend.layout.layout')
@section ('content')



        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <a href="{{route('urunler')}}">Ürünler</a><span class="mx-2 mb-0">/</span><strong class="text-black">{{$product->model ?? ''}}</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset($product->image ?? '')}} " alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black">{{$product->model ?? ''}}</h2>
                      {!! $product->description ?? '' !!}

                        <p><strong class="text-primary h4"> {{$product->capacity ?? ''}}</strong></p>



                    </div>
                </div>
            </div>
        </div>


@endsection
