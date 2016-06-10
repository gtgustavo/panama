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

<div class="section">

    {!! Field::text('reference_point', ['class' => 'gui-input', 'ph' => trans('validation.attributes.reference_point'), 'max' => '50']) !!}

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>