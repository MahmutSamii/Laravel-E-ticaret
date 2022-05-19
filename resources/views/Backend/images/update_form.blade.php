@extends('backend.shared.backend-theme')
@section('title','Ürünler Modülü')
@section('subtitle','Resim güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/products/$product->product_id/images/$image->image_id")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <input type="hidden" name="image_id" value="{{$image->image_id}}">
        <div class="row">
            <div class="col-12">
                <img src="{{asset("storage/products/$image->image_url")}}" alt="" width="700">
            </div>
        </div>
        <div class="row">
            <x-input label="Dosya Yükle" placeholder="" type="file" field="image_url" col="col-lg-6"/>
            <x-input label="Açıklama" placeholder="Kısa açıklama giriniz" type="text" field="alt" col="col-lg-6" value="{{$image->alt}}"/>
        </div>
        <div class="row">
            <x-input label="Sıra" placeholder="Resim sırasını belirtiniz" field="seq" col="col-lg-6" value="{{$image->seq}}"/>
            <x-checkbox label="Aktif" field="is_active" checked="{{$image->is_active == 1}}"/>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
