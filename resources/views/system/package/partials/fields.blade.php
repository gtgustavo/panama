<div class="section" align="right">

    {!! $barcode !!} <strong> {{ $wr_code }} </strong>

</div>

@can('admin')

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

            <select name="consigning_id" id="consigning" class="form-control"></select>

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

        @include('system.package.partials.ajax')

    @endsection

@else

    <div class="section row">

        <div class="col-md-12">

            <label for="client" class="field-label text-muted fs18 mb10">
                {!! trans('validation.attributes.consigning') !!}
            </label>

            <select name="consigning_id" class="form-control" required>

                <option value=""> {!! trans('front.form.element.option') !!} </option>

                @foreach($consign as $data)

                    <option value="{!! $data->id !!}"> {!! $data->consign !!} </option>

                @endforeach

            </select>

        </div>

    </div>

    <div class="section row mbn">

        <div class="col-sm-12">
            <p class="text-right">
                {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
            </p>
        </div>
    </div>

@endcan