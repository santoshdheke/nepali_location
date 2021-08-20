
    <label for="">District</label>
    <select name="district" id="district" class="form-control">
        <option value="">Choose District</option>
        @if(isset($states) && count($states)>0)
            @foreach($states as $state)
        <option value="{{ $state->id }}">{{ $state->title }}</option>
            @endforeach
            @endif
    </select>
    @if(isset($errors) && $errors->has('district'))
        <code>{{ $errors->first('district') }}</code>
    @endif
