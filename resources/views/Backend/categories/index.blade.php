@extends('backend.shared.backend-theme')
@section('title','Kategori Modülü')
@section('subtitle','Kategoriler')
@section('add_new_url',url('/categories/create'))
@section('btn_url',url('/categories/create'))
@section('btn_label','yeni ekle')
@section('content')
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Adı</th>
            <th scope="col">Slug</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <tr id="{{$category->category_id}}">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start ">
                            <li class="nav-item">
                                <a href="{{url("/categories/$category->category_id/edit")}}" class="nav-link text-black">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("/categories/$category->category_id")}}"
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
                    <p class="text-center">Herhangi bir kategori bulunamadı!!</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

