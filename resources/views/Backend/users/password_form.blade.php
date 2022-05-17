@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Modülü')
@section('subtitle','Şifre Güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users/$user->user_id/change-password")}}" method="post">
        @csrf
        <div class="row">
            <x-input label="Şifre" placeholder="*******" type="password" field="password" col="col-lg-6"/>
            <x-input label="Şifre Tekrar" placeholder="*******" type="password" field="password_confirmation" col="col-lg-6"/>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
