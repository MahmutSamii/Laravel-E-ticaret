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
            <div class="col-lg-6">
                <label for="city" class="form-label">Şehir</label>
                <input type="text" class="form-control" id="city" name="city"
                       value="{{old('name',$address->city)}}">
                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="district" class="form-label">İlçe</label>
                <input type="text" class="form-control" id="district" name="district"
                       value="{{old('district',$address->district)}}">
                @error('district')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="zipcode" class="form-label">Posta kodu</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode"
                       value="{{old('zipcode',$address->zipcode)}}">
                @error('zipcode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_default" name="is_default" value="1"
                           @if($address->is_default == 1) checked @endif>
                    <label for="is_default" class="form-check-label">
                        Varsayılan Adres
                    </label>
                    @error('is_default')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="address" class="form-label">Açık Adres</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control">{{old('zipcode',$address->address)}}</textarea>
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection
