@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Modülü')
@section('subtitle','Yeni Adres ekle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users/$user->user_id/addresses")}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <x-input label="Şehir" placeholder="Şehir giriniz" type="text" field="city" col="col-lg-6"/>
            <x-input label="İlçe" placeholder="İlçe giriniz" type="text" field="district" col="col-lg-6"/>
        </div>
        <div class="row">
            <x-input label="Posta kodu" placeholder="Posta kodunu giriniz" type="text" field="zipcode" col="col-lg-6"/>
            <x-checkbox label="Varsayılan Adres" field="is_default"/>
        </div>
         <x-textarea label="Açık adres" placeholder="Açık adresinizi giriniz" field="address"/>
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

