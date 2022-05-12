<div class="row">
    <div class="col-lg-12">
        <label for="{{$field}}" class="form-label">{{$label}}</label>
        <textarea name="{{$field}}" id="{{$field}}" cols="30" rows="10" class="form-control" placeholder="{{$placeholder}}">{{old($field,$value)}}</textarea>
        @error("$field")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
