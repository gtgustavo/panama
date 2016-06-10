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
        {!! Field::text('dni',    ['class' => 'gui-input', 'ph' => trans('validation.attributes.dni'),  'max' => '10']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::email('email', ['class' => 'gui-input', 'ph' => trans('validation.attributes.email'), 'max' => '30']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('phone_c', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_c'), 'max' => '15']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('phone_h', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_h'), 'max' => '15']) !!}
    </div>

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>