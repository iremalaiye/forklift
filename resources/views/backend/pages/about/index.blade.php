@extends('backend.layout.app')
@section('content')

    <div class="container mt-4">

        {{-- About section title --}}
        <h4>Hakkımızda Bilgileri</h4>

        <div class="card">
            <div class="card-body">
                {{-- About image --}}
                <img src="{{ asset($about->image??"") }}" width="200" class="img-fluid my-2">

                {{-- Main title --}}
                <h5>{{ $about->name ??""}}</h5>


                {{-- Main content  --}}
                <p>{!! $about->content??"" !!}</p>
                <hr>
                {{-- Edit button --}}
                @if(!empty($about) && !empty($about->id))
                    <a href="{{ route('panel.about.edit', $about->id) }}"class="btn btn-sm btn-warning mb-3">Düzenle</a>
                @endif
            </div>

        </div>


    </div>

@endsection
