<label for="">Province</label>
<select name="province" class="form-control" id="province">
    <option value="">Choose Province</option>
    @if(isset($provinces) && count($provinces)>0)
        @foreach($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->title }}</option>
        @endforeach
    @endif
</select>
@if(isset($errors) && $errors->has('province'))
    <code>{{ $errors->first('province') }}</code>
@endif
