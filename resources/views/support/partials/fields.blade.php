<div class="section row">

    <div class="col-md-12">
        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.theme') !!}
        </label>

        {!! Form::select('ticket_id', $theme, null, ['class'=> 'gui-input']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-12">
        {!! Field::textarea('problem', ['class' => 'form-control', 'ph' => trans('validation.attributes.problem'), 'max' => '255']) !!}
    </div>

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>