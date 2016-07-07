<div class="section">

    {!! Field::text('theme', ['class' => 'gui-input', 'ph' => trans('validation.attributes.theme'), 'max' => '50']) !!}

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-danger']) !!}
        </p>
    </div>
</div>