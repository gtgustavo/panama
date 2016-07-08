<div class="section">

    {!! Field::text('name',         ['class' => 'gui-input', 'ph' => trans('validation.attributes.name'),         'max' => '150']) !!}

</div>

<div class="section row">

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.country') !!}
        </label>

        <select name="country_id" id="country" class="form-control" required>

            <option value=""> {!! trans('front.form.element.option') !!} </option>

            @foreach($country as $data)

                <option value="{!! $data->id !!}"> {!! $data->name !!} </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-6">
        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.province') !!}
        </label>

        <select name="province_id" id="province" class="form-control" required></select>
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('city',        ['class' => 'gui-input', 'ph' => trans('validation.attributes.city'),        'max' => '30']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('postal_code', ['class' => 'gui-input', 'ph' => trans('validation.attributes.postal_code'), 'max' => '10']) !!}
    </div>

</div>

<div class="section">

    {!! Field::text('address',         ['class' => 'gui-input', 'ph' => trans('validation.attributes.address'),         'max' => '150']) !!}

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-danger']) !!}
        </p>
    </div>
</div>

@section('script')

    @include('administration.employee.partials.ajax_country')

@endsection