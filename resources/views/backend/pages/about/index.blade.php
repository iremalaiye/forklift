@extends('backend.layout.app')
@section('content')

    <div class="container mt-4">
        <h4>Hakkımızda Bilgileri</h4>
        @if(!empty($about) && !empty($about->id))
            <a href="{{ route('panel.about.edit', $about->id) }}"class="btn btn-sm btn-warning mb-3">Düzenle</a>
        @endif


        <div class="card">
            <div class="card-body">
                <h5>{{ $about->name ??""}}</h5>
                <img src="{{ asset($about->image??"") }}" width="200" class="img-fluid my-2">
                <p>{!! $about->content??"" !!}</p>

                <hr>

                <h6><i class="{{ $about->text_1_icon??"" }}"></i> {{ $about->text_1??"" }}</h6>
                <p>{{ $about->text_1_content ??""}}</p>

                <h6><i class="{{ $about->text_2_icon??"" }}"></i> {{ $about->text_2??"" }}</h6>
                <p>{{ $about->text_2_content??"" }}</p>

                <h6><i class="{{ $about->text_3_icon??"" }}"></i> {{ $about->text_3 ??""}}</h6>
                <p>{{ $about->text_3_content ??""}}</p>
            </div>
        </div>
    </div>

@endsection
