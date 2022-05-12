@extends('backend.shared.backend-theme')
@section('title','Kullanıcı Adres Modülü')
@section('subtitle','Adres güncelle')
@section('btn_url',url()->previous())
@section('btn_label','geri dön')
@section('content')
    <form action="{{url("/users/$user->user_id/addresses/$address->address_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <input type="hidden" name="address_id" value="{{$address->address_id}}">
        <div class="row">
            <x-input label="Şehir" value="{{old('city',$address->city)}}" placeholder="Şehir giriniz" type="text" field="city"/>
            <x-input label="İlçe" value="{{old('district',$address->district)}}" placeholder="İlçe giriniz" type="text" field="district"/>
        </div>
        <div class="row">
            <x-input label="Posta kodu" value="{{old('zipcode',$address->zipcode)}}" placeholder="Posta kodunu giriniz" type="text" field="zipcode"/>
            <x-checkbox label="Varsayılan Adres" field="is_default" checked="{{$address->is_default == 1}}"/>
        </div>
        <x-textarea label="Açık adres" placeholder="Açık adresinizi giriniz" field="address" value="{{$address->address}}"/>
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
