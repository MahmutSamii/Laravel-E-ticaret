@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Modülü')
@section('subtitle','Kullanıcı güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users/$user->user_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <x-input label="Ad Soyad" placeholder="Ad soyad giriniz" type="text" field="name" value="{{old('name',$user->name)}}" col="col-lg-6"/>
            <x-input label="Email" placeholder="Email giriniz" type="email" field="email" value="{{old('email',$user->email)}}" col="col-lg-6"/>
        </div>
        <div class="row">
            <x-checkbox label="Yetkili Kullanıcı" type="checkbox" field="is_admin" checked="{{$user->is_admin == 1}}"/>
            <x-checkbox label="Aktif" type="checkbox" field="is_active" checked="{{$user->is_active == 1}}"/>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
