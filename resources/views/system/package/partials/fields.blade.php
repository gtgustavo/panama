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

            <label for="client" class="field-label text-muted fs18 mb10">
                {!! trans('validation.attributes.type') !!}
            </label>

            <select name="box_id" id="box" class="form-control" required>

                @foreach($boxes as $data)

                    <option value="{!! $data->id !!}"> {!! $data->full_box !!} </option>

                @endforeach

            </select>

        </div>

        <div class="col-md-6">

            <label for="client" class="field-label text-muted fs18 mb10">
                {!! trans('validation.attributes.shipping_type') !!}
            </label>

            {!! Form::select('shipping_type', config('options.shipping_type'), null, ['class' => 'form-control', 'id' => 'shipping_type']) !!}

        </div>

    </div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::number('extra_pounds',  ['min' => '0.00', 'step' => '0.01', 'class' => 'gui-input', 'ph' => trans('validation.attributes.extra_pounds'), 'max' => '5']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('cost',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost'), 'max' => '10']) !!}
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