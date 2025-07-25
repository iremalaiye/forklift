@extends('backend.layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hizmetlerimiz Listesi</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.services.create') }}" class="btn btn-primary">Yeni Ürün Ekle</a>
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
                                <th>İkon</th>
                                <th>Başlık</th>
                                <th>İçerik</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($services->count() > 0)
                                @foreach($services as $service)
                                    <tr>
                                        <td class="py-1">
                                            <i class="fa fa-truck fa-2x"></i>

                                        </td>
                                        <td>{{ $service->text??"" }}</td>

                                        <td>{{ $service->content ??""}}</td>

                                        <td>

                                            <div class="checkbox" item-id="{{$service->id}}">
                                                <label>
                                                    <input type="checkbox" class="durum " data-on="aktif" data-off="pasif" data-onstyle="success" data-offstyle="danger" data-size="small" {{$service->status=='1'? 'checked' :''}} data-toggle="toggle">

                                                </label>
                                            </div>

                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('panel.services.edit', $service->id) }}" class="btn btn-sm btn-warning mr-2">Düzenle</a>
                                            <form action="{{ route('panel.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
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
                url:"{{route('panel.services.status')}}",
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
