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
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('panel.products.edit', $product->id) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-4 h-100" style="min-height: 100%;">
                        <img src="{{ asset($product->image) }}"
                             class="card-img-top rounded-top-4"
                             alt="{{ $product->name }}"
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body p-2 text-center">
                            <h6 class="card-title text-danger mb-1" style="font-size: 16px;">{{ $product->model }}</h6>
                            <p class="text-danger mb-1" style="font-size: 14px;">{{ $product->capacity }}</p>
                            <p class="text-muted small mb-2" style="font-size: 12px;">{{ $product->content }}</p>
                            <small class="text-muted d-block" style="font-size: 11px;">
                                {{ $product->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>



@endsection

