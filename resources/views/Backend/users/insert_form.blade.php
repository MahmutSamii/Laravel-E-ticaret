@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Modülü')
@section('subtitle','Yeni Kullanıcı ekle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users")}}" method="post">
        @csrf
        <div class="row">
            <x-input label="Ad Soyad" placeholder="Ad soyad giriniz" type="text" field="name" col="col-lg-6"/>
            <x-input label="Email" placeholder="Email giriniz" type="email" field="email" col="col-lg-6"/>
        </div>
        <div class="row">
            <x-input label="Şifre" placeholder="*******" type="password" field="password" col="col-lg-6"/>
            <x-input label="Şifre Tekrar" placeholder="*******" type="password" field="password_confirmation" col="col-lg-6"/>
        </div>
        <div class="row">
            <x-checkbox label="Yetkili Kullanıcı" field="is_admin"/>
            <x-checkbox label="Aktif" field="is_active"/>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

