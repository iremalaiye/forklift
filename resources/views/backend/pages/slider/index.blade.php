@extends('backend.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Anasayfa İçeriği </h4>
                    <p class="card-description">
                        <a href="{{route('panel.slider.create')}}" class="btn btn-primary">Yeni</a>
                    </p>


                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Başlık</th>
                                <th>Slogan</th>
                                <th>Link</th>
                                <th>Durum</th>
                                <th>Düzenle</th>

                            </tr>
                            </thead>
                            <tbody>
@if(!empty($sliders)&&$sliders->count()>0)
    @foreach($sliders as $slider)
        <tr>
            <td class="py-1">
                <img src="{{asset($slider->image)}}" alt="image"/>
            </td>
            <td>{{($slider->name)}}</td>
            <td>{{($slider->content?? '')}}</td>
            <td>{{($slider->link)}}</td>

            <td>
                <div class="checkbox" item-id="{{$slider->id}}">
                    <label>
                        <input type="checkbox" class="durum " data-on="aktif" data-off="pasif" data-onstyle="success" data-offstyle="danger" {{$slider->status=='1'? 'checked' :''}} data-toggle="toggle">

                    </label>
                </div>

            </td>
            <td> <a href="{{route('panel.slider.edit',$slider->id)}}" class="btn btn-sm btn-warning mr-2">Düzenle</a></td>
            <td class="d-flex">
                <form action="{{route('panel.slider.destroy',$slider->id)}} " method="POST">
                    @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-sm btn-danger">Sil</button>
            </form>
            </td>
        </tr>
    @endforeach

    @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
