<div class="col-lg-6">
    <label for="{{$field}}" class="form-label">{{$label}}</label>
    <input type="{{$type}}" class="form-control" id="{{$field}}" value="{{old("$field","$value")}}" name="{{$field}}"
           placeholder="{{$placeholder}}">
    @error("$field")
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
