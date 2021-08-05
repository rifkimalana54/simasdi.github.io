<div class="form-group">
    <label>{{ $title }}</label>
    <textarea type="{{$type}}" name="{{$name}}" class="form-control" style="height: 90px;">@isset(($object->{$name})){{old($name)?old($name) : $object->{$name} }}@else{{old($name)}}@endisset</textarea>
</div>
