@extends('backend.layout.app')
@section('content')

    <h4>Hizmetlerimiz</h4>
<div class="card">

    <div class="card-body">

        <div class="site-section site-section-sm site-blocks-1">
            <div class="container">
                <div class="row">
                    {{-- First text with icon --}}
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                        <div class="icon mr-4 align-self-start" >
                            <span class="{{ $services->text_1_icon??"" }}" ></span>
                        </div>
                        <div class="text">
                            <h2 class="text-uppercase">{{ $services->text_1??"" }}</h2>
                            <p>{{ $services->text_1_content ??""}} </p>
                        </div>
                    </div>

                    {{-- Second text with icon --}}
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon mr-4 align-self-start">
                            <span class="{{ $services->text_2_icon??"" }}" ></span>
                        </div>
                        <div class="text">
                            <h2 class="text-uppercase">{{ $services->text_2??"" }}</h2>
                            <p>{{ $services->text_2_content??"" }}</p>
                        </div>
                    </div>

                    {{-- Third text with icon --}}
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon mr-4 align-self-start">
                            <span class="{{ $services->text_3_icon??"" }}" ></span>
                        </div>
                        <div class="text">
                            <h2 class="text-uppercase">{{ $services->text_3 ??""}}</h2>
                            <p> {{ $services->text_3_content ??""}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <hr>
        {{-- Edit button --}}
        @if(!empty($services) && !empty($services->id))
            <a href="{{ route('panel.services.edit', $services->id) }}"class="btn btn-sm btn-warning mb-3">Düzenle</a>
        @endif

    </div>


</div>
@endsection
