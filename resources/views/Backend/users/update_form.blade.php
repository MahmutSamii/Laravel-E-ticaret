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
            <div class="col-lg-6">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ad soyad giriniz"
                       value="{{old('name',$user->name)}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email giriniz"
                       value="{{old('email',$user->email)}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1"
                           @if($user->is_admin == 1) checked @endif>
                    <label for="is_admin" class="form-check-label">
                        Yetkili Kullanıcı
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                           @if($user->is_active == 1) checked @endif>
                    <label for="is_active" class="form-check-label">
                        Aktif
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
