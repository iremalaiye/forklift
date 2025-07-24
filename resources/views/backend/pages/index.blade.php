@extends('backend.layout.app')
@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Forklift Dashboard</h3>
                    <h6 class="font-weight-normal mb-0">Forklift Ürünlerimiz </h6>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        @foreach($latestProducts as $product)
            <div class="col-md-4 mb-4">
                <a href="{{ route('panel.products.edit', $product->id) }}" class="text-decoration-none ">
                    <div class="card h-100 shadow-sm" >
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->model }}</h5>
                            <h5 class="card-title">{{ $product->capacity }}</h5>
                            <h5 class="card-title">{{ $product->description }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Oluşturuldu: {{ $product->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


@endsection

