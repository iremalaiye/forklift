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

                                        <td>{{ $product->capacity }}</td>
                                        <td>{{ Str::limit($product->description, 50) }}</td>
                                        <td>

                                            <div class="checkbox" item-id="{{$product->id}}">
                                                <label>
                                                    <input type="checkbox" class="durum " data-on="aktif" data-off="pasif" data-onstyle="success" data-offstyle="danger" data-size="small" {{$product->status=='1'? 'checked' :''}} data-toggle="toggle">

                                                </label>
                                            </div>

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


@section('customjs')
    <script>

        $(document).on('change', '.durum', function(e) {

            id = $(this).closest('.checkbox').attr('item-id');
            statu = $(this).prop('checked');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"{{route('panel.product.status')}}",
                data:{
                    id:id,
                    statu:statu
                },
                success: function (response) {
                    if (response.status=="1")
                    {
                        alertify.success("Durum Aktif Edildi");
                    } else {
                        alertify.error("Durum Pasif Edildi");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Hatası:", xhr.responseText);
                }
            });
        });



    </script>
@endsection
