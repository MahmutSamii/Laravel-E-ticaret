@extends('backend.shared.backend-theme')
@section('title','Ürünler Modülü')
@section('subtitle','Fotoğraflar')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/products/$product->product_id/images")}}" method="post" enctype="multipart/form-data" autocomplete="off" novalidate>
        @csrf
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <x-input label="Dosya Yükle" placeholder="" type="file" field="image_url" col="col-lg-6"/>
            <x-input label="Açıklama" placeholder="Kısa açıklama giriniz" type="text" field="alt" col="col-lg-6"/>
        </div>
        <div class="row">
            <x-input label="Sıra" placeholder="Resim sırasını belirtiniz" field="seq" col="col-lg-6"/>
            <x-checkbox label="Aktif" field="is_active"/>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

