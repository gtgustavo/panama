<div class="section">
    {!! Form::file('file', null, ['class' => 'gui-input', 'placeholder' => 'file']) !!}
</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn orange']) !!}
        </p>
    </div>
</div>