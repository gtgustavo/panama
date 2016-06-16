<div class="section row">

    <div class="col-md-6">
        {!! Field::text('first_name', ['class' => 'gui-input', 'ph' => trans('validation.attributes.first_name'), 'max' => '30']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('last_name',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.last_name'),  'max' => '30']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('dni',    ['class' => 'gui-input', 'ph' => trans('validation.attributes.dni'),  'max' => '15']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::email('email', ['class' => 'gui-input', 'ph' => trans('validation.attributes.email'), 'max' => '30']) !!}
    </div>

</div>

@if(! Auth::check())

    @include('system.client.partials.field_password')

@endif

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('phone_c', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_c'), 'max' => '15']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('phone_h', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_h'), 'max' => '15']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('country',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.country'), 'max' => '50']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('province', ['class' => 'gui-input', 'ph' => trans('validation.attributes.province'),  'max' => '50']) !!}
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

@if(Auth::check())

    <div class="section row mbn">

        <div class="col-sm-12">
            <p class="text-right">
                {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
            </p>
        </div>
    </div>

@endif