@extends('backend.shared.backend-theme')
@section('title','Ürün Modülü')
@section('subtitle','Ürünler')
@section('add_new_url',url('/products/create'))
@section('btn_url',url('/products/create'))
@section('btn_label','yeni ekle')
@section('content')
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Kategori</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Eski fiyat</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $product)
                <tr id="{{$product->product_id}}">
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>
                        @if($product->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start ">
                            <li class="nav-item">
                                <a href="{{url("/products/$product->product_id/edit")}}" class="nav-link text-black">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("/products/$product->product_id")}}"
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
                <td colspan="7">
                    <p class="text-center">Herhangi bir ürün bulunamadı!!</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

