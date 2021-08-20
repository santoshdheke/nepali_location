<label for="">Municipality</label>
<select name="municipality" class="form-control">
    <option value="">Choose Municipality</option>
    @if(isset($municipalities) && count($municipalities)>0)
        @foreach($municipalities as $municipality)
            <option value="{{ $municipality->id }}">{{ $municipality->title }}</option>
        @endforeach
    @endif
</select>
@if(isset($errors) && $errors->has('municipality'))
    <code>{{ $errors->first('municipality') }}</code>
@endif
