<div class="section row">

    <div class="col-md-6">
        {!! Field::text('box', ['class' => 'gui-input', 'ph' => trans('validation.attributes.box'), 'max' => '50']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('dimensions',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.dimensions'),  'max' => '20']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('maximum_poundage', ['class' => 'gui-input', 'ph' => trans('validation.attributes.maximum_poundage'), 'max' => '20']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('cost_extra_pound', ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost_extra_pound'), 'max' => '10']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('cost_standard', ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost_standard'), 'max' => '10']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('cost_express', ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost_express'), 'max' => '10']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.coin') !!}
        </label>

        {!! Form::select('coin_id', $coin, isset($box->coin_id) ? $box->coin_id : null, ['class'=> 'form-control']) !!}

    </div>

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-danger']) !!}
        </p>
    </div>
</div>