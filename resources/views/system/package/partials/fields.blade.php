<div class="section">

    {!! $barcode !!} <strong> {{ $wr_code }} </strong>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('dni',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.dni'), 'max' => '10']) !!}
    </div>

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.name') !!}
        </label>

        <div id="info"></div>

    </div>

</div>

<div class="section row">

    <div class="col-md-12">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.consigning') !!}
        </label>

        <select name="consigning_id" id="consigning" class="gui-input"></select>

    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('type',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.type'), 'max' => '50']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('cost', ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost'), 'max' => '13']) !!}
    </div>

</div>

<div class="section">
    {!! Field::text('note', ['class' => 'gui-input', 'ph' => trans('validation.attributes.note'), 'max' => '150']) !!}
</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>

@section('script')

    <script type="text/javascript">

        $(document).ready(function() {

            $('#dni').blur(function() {

                $('#info').html('<img src="/../assets/img/loader.gif" alt="" />').fadeOut(1000);

                var dni = $(this).val();

                $.ajax({

                    type: "GET",

                    url: "{{ route('ajax_dni_client') }}",

                    data: {dni: dni},

                    success: function(data) {

                        $('#info').fadeIn(1000).html(data);

                    }

                });

                $.ajax({

                    type: "GET",

                    url: "{{ route('ajax_consigning_client') }}",

                    data: {dni: dni},

                    success: function(data) {

                        $('#consigning').fadeIn(1000).html(data);

                    }

                });

            });

        });
    </script>

@endsection