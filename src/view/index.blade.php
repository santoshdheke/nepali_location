
<div class="form-group" id="province_div">
    <label for="">Province</label>
    <select name="province" class="form-control">
        <option value="">Choose Province</option>
    </select>
    @if($errors->has('province'))
        <code>{{ $errors->first('province') }}</code>
    @endif
</div>

<div class="form-group" id="district_div">
    <label for="">District</label>
    <select name="district" class="form-control">
        <option value="">Choose District</option>
    </select>
    @if($errors->has('district'))
        <code>{{ $errors->first('district') }}</code>
    @endif
</div>

<div class="form-group" id="municipality_div">
    <label for="">Municipality</label>
    <select name="municipality" class="form-control">
        <option value="">Choose Municipality</option>
    </select>
    @if($errors->has('municipality'))
        <code>{{ $errors->first('municipality') }}</code>
    @endif
</div>

@push('js')
    <script>
        $(document).ready(function () {
            $.get('{{ url('address-package/province') }}',function (view) {
                $('#province_div').html(view);
            });

            $(document).on('change','#province',function () {
                var id = $(this).val();
                $.get('{{ url('address-package/state') }}'+'/'+id,function (view) {
                    $('#district_div').html(view);
                });
            });

            $(document).on('change','#district',function () {
                var id = $(this).val();
                $.get('{{ url('address-package/municipality') }}'+'/'+id,function (view) {
                    $('#municipality_div').html(view);
                });
            });
        });
    </script>
    @endpush
