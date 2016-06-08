<div class="section row">

    <div class="col-md-6">
        {!! Field::text('name',        ['class' => 'gui-input', 'ph' => trans('validation.attributes.profile'),     'max' => '30']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('description', ['class' => 'gui-input', 'ph' => trans('validation.attributes.description'), 'max' => '100' ]) !!}
    </div>

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>