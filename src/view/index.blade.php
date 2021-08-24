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
    <select name="district" id="district" class="form-control">
        <option value="">Choose District</option>
        @if(isset($districts) && count($districts)>0)
            @foreach($districts as $district)
                <option {{ (isset($row) && $row->district == $district->title)?'selected':'' }} value="{{ $district->id }}">{{ $district->title }}</option>
            @endforeach
        @endif
    </select>
    @if($errors->has('district'))
        <code>{{ $errors->first('district') }}</code>
    @endif
</div>

<div class="form-group" id="municipality_div">
    <label for="">Municipality</label>
    <select name="municipality" class="form-control">
        <option value="">Choose Municipality</option>
        @if(isset($municipalities) && count($municipalities)>0)
            @foreach($municipalities as $municipality)
                <option {{ (isset($row) && $row->municipality == $municipality->title)?'selected':'' }} value="{{ $municipality->id }}">{{ $municipality->title }}</option>
            @endforeach
        @endif
    </select>
    @if($errors->has('municipality'))
        <code>{{ $errors->first('municipality') }}</code>
    @endif
</div>

@push('js')
    <script>
        function provienceHtml(datas) {

            var html = `<label for="">Province</label>
                <select name="province" class="form-control" id="province">
                    <option value="">Choose Province</option>`;

            datas.data.forEach(function (data, key) {
                html = html + `<option `;

                @if (isset($row))
                if (data.title == "{{ $row->province }}") {
                    html = html + "selected ";
                }
                @endif

                html = html + `value="${data.id}">${data.title}</option>`;
            })

            html = html + `</select>
                @if(isset($errors) && $errors->has('province'))
                <code>{{ $errors->first('province') }}</code>
                @endif
                `;

            return html;
        }

        function districtHtml(datas) {

            var html = `<label for="">District</label>
                <select name="district" id="district" class="form-control">
                    <option value="">Choose District</option>`;

            datas.data.forEach(function (data, key) {
                html = html + `<option value="${data.id}">${data.title}</option>`;
            })

            html = html + `</select>
                @if(isset($errors) && $errors->has('district'))
                <code>{{ $errors->first('district') }}</code>
                @endif`;

            return html;
        }

        function municipalityHtml(datas) {

            var html = `<label for="">Municipality</label>
                <select name="municipality" class="form-control" id="municipality">
                    <option value="">Choose Municipality</option>`;

            datas.data.forEach(function (data, key) {
                html = html + `<option value="${data.id}">${data.title}</option>`;
            })

            html = html + `</select>
                @if(isset($errors) && $errors->has('municipality'))
                <code>{{ $errors->first('municipality') }}</code>
                @endif
                `;

            return html;
        }

        $(document).ready(function () {
            $.get('{{ url('address-package/province') }}', function (data) {
                var view = provienceHtml(data);
                $('#province_div').html(view);
            });

            $(document).on('change', '#province', function () {
                var id = $(this).val();
                $.get('{{ url('address-package/state') }}' + '/' + id, function (data) {
                    var view = districtHtml(data);
                    $('#district_div').html(view);
                });
            });

            $(document).on('change', '#district', function () {
                var id = $(this).val();
                $.get('{{ url('address-package/municipality') }}' + '/' + id, function (data) {
                    var view = municipalityHtml(data);
                    $('#municipality_div').html(view);
                });
            });
        });
    </script>
@endpush
