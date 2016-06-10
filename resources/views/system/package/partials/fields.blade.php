<div class="section">

    {!! $barcode !!} <strong> {{ $wr_code }} </strong>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('dni',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.dni'), 'max' => '10']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('type',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.type'), 'max' => '50']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('cost', ['class' => 'gui-input', 'ph' => trans('validation.attributes.cost'), 'max' => '13']) !!}
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