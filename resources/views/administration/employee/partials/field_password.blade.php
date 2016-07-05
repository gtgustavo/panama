<div class="section row">

    <div class="col-md-6">
        {!! Field::password('password',               ['class' => 'gui-input', 'ph' => trans('validation.attributes.password')]) !!}
    </div>

    <div class="col-md-6">
        {!! Field::password('password_confirmation',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.password_confirmation')]) !!}
    </div>

</div>