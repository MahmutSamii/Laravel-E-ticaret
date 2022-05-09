@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Modülü')
@section('subtitle','Yeni Kullanıcı ekle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users")}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name"
                       placeholder="Ad soyad giriniz">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email"
                       placeholder="Email giriniz">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                       placeholder="*******">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1">
                    <label for="is_admin" class="form-check-label">
                        Yetkili Kullanıcı
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
                    <label for="is_active" class="form-check-label">
                        Aktif
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

