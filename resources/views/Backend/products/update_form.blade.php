@extends('backend.shared.backend-theme')
@section('title','Ürün Modülü')
@section('subtitle','Ürün güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/products/$product->product_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <x-input label="Ürün Adı" placeholder="Ürün adı giriniz" field="name" col="col-lg-6" value="{{old('name',$product->name)}}"/>
            <div class="col-lg-6">
                <label for="category_id" class="form-label">Kategori Seçiniz</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="-1">Seçiniz</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_id}}" @if($product->category_id == $category->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                @error("category_id")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <x-input label="Ürün Fiyatı" placeholder="Fiyat giriniz" field="price" col="col-lg-6" value="{{old('price',$product->price)}}"/>
            <x-input label="Eski Fiyatı" placeholder="Eski fiyat giriniz" field="old_price" col="col-lg-6" value="{{old('old_price',$product->old_price)}}"/>
        </div>
        <div class="row">
            <x-input field="lead" label="Kısa Açıklama" placeholder="Açıklama Giriniz" col="col-lg-12" value="{{old('lead',$product->lead)}}"/>
        </div>
        <div class="row">
            <x-textarea field="description" label="Açıklama" placeholder="Detaylı Açıklama Giriniz" value="{{old('description',$product->description)}}"/>
        </div>
        <div class="row">
            <x-checkbox field="is_active" label="Aktif" checked="{{$product->is_active == 1}}"/>
        </div>
        <div class="row mb-1">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET
                </button>
            </div>
        </div>
    </form>
@endsection
