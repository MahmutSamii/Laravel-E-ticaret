@extends('backend.shared.backend-theme')
@section("title","Ürün Modülü")
@section("subtitle","Yeni Ürün Ekle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/products")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="row">
            <x-input label="Ürün Adı" placeholder="Ürün adı giriniz" field="name" col="col-lg-6"/>
            <div class="col-lg-6">
                <label for="category_id" class="form-label">Kategori Seçiniz</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="-1">Seçiniz</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error("category_id")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <x-input label="Ürün Fiyatı" type="number" step="any" placeholder="Fiyat giriniz" field="price" col="col-lg-6"/>
            <x-input label="Eski Fiyatı" type="number" step="any" placeholder="Eski fiyat giriniz" field="old_price" col="col-lg-6"/>
        </div>
        <div class="row">
                <x-input field="lead" label="Kısa Açıklama" placeholder="Açıklama Giriniz" col="col-lg-12"/>
        </div>
        <div class="row">
            <x-textarea field="description" label="Açıklama" placeholder="Detaylı Açıklama Giriniz"/>
        </div>
        <div class="row">
            <x-checkbox field="is_active" label="Aktif"/>
        </div>
        <div class="row mb-1">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET
                </button>
            </div>
        </div>
    </form>
@endsection

