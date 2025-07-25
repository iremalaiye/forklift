@extends('backend.layout.app')

@section('content')
    <div class="row">


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($service) ? 'Ürünü Düzenle' : 'Yeni Ürün Ekle' }}</h4>

                    {{-- error --}}
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {{-- success message --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Form action --}}
                    @php
                        $route = isset($service)
                            ? route('panel.services.update', $service->id)
                            : route('panel.services.store');
                    @endphp

                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @if(isset($service))
                            @method('PUT')
                        @endif



                        {{-- başlık --}}
                        <div class="form-group">
                            <label for="text">Başlık</label>
                            <input type="text" id="text" name="text" class="form-control" value="{{ $service->text ?? old('capacity') }}" placeholder="Başlık">
                        </div>

                        {{-- içerik --}}
                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea id="content" name="content" class="form-control" rows="4" placeholder="Ürün açıklaması">{{ $service->content ?? old('Açıklama') }}</textarea>
                        </div>

                        {{-- durum --}}
                        <div class="form-group">
                            <label for="status">Durum</label>
                            @php $status = $service->status ?? '1'; @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Pasif</option>
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">{{ isset($service) ? 'Güncelle' : 'Kaydet' }}</button>
                        <a href="{{ route('panel.services.index') }}" class="btn btn-light">İptal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection



