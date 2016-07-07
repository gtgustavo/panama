<div class="section">
    {!! Field::password('password',               ['class' => 'gui-input', 'ph' => trans('validation.attributes.password')]) !!}
</div>

<div class="section">
    {!! Field::password('password_confirmation',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.password_confirmation')]) !!}
</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn-danger']) !!}
        </p>
    </div>
</div>