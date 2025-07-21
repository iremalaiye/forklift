@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ürün Listesi</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.products.create') }}" class="btn btn-primary">Yeni Ürün Ekle</a>
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Model</th>
                                <th>Slug</th>
                                <th>Kapasite</th>
                                <th>Açıklama</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products->count() > 0)
                                @foreach($products as $product)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset($product->image ?? 'img/resimyok.webp') }}" alt="Ürün Resmi" width="100">
                                        </td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->capacity }}</td>
                                        <td>{{ Str::limit($product->description, 50) }}</td>
                                        <td>
                                            <label class="badge badge-{{ $product->status == 1 ? 'success' : 'danger' }}">
                                                {{ $product->status == 1 ? 'Aktif' : 'Pasif' }}
                                            </label>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('panel.products.edit', $product->id) }}" class="btn btn-sm btn-warning mr-2">Düzenle</a>
                                            <form action="{{ route('panel.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Henüz ürün eklenmemiş.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
