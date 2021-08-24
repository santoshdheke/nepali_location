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
        function provienceHtml(datas) {

            var html = `<label for="">Province</label>
                <select name="province" class="form-control" id="province">
                    <option value="">Choose Province</option>`;

            datas.data.forEach(function (data, key) {
                html = html + `<option value="${data.id}">${data.title}</option>`;
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
