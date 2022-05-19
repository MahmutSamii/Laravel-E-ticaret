@extends('backend.shared.backend-theme')
@section('title','Ürünler Modülü')
@section('subtitle','Fotoğraflar')
@section('btn_url',url("/products/$product->product_id/images/create"))
@section('btn_label','yeni ekle')
@section('content')
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">Fotoğraf</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($product->images) > 0)
            @foreach($product->images as $image)
                <tr id="{{$image->image_id}}">
                    <td>{{$image->seq}}</td>
                    <td>{{$image->image_url}}</td>
                    <td>{{$image->alt}}</td>
                    <td>
                        @if($image->is_active == 1)
                            <span class="badge bg-success">Evet</span>
                        @else
                            <span class="badge bg-danger">Hayır</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start ">
                            <li class="nav-item">
                                <a href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}" class="nav-link text-black">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("/products/$product->product_id/images/$image->image_id")}}"
                                   class="nav-link list-item-delete text-black">
                                    <span data-feather="trash-2"></span>
                                    Sil
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <p class="text-center">Herhangi bir fotoğraf bulunamadı!!</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

