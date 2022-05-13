@extends('backend.shared.backend-theme')
@section('title','Kategori Modülü')
@section('subtitle','Kategori güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/categories/$category->user_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$category->user_id}}">
        <div class="row">
            <x-input label="Kategori Adı" placeholder="Kategori Adı giriniz" type="text" field="name" value="{{old('name',$category->name)}}"/>
            <x-input label="Slug" placeholder="Slug giriniz" type="text" field="slug" value="{{old('slug',$category->slug)}}"/>
        </div>
        <div class="row">
            <x-checkbox label="Aktif" type="checkbox" field="is_active" checked="{{$category->is_active == 1}}"/>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
