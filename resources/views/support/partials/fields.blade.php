@can('client')

    @if(isset($theme))

        <div class="section row">

            <div class="col-md-12">
                <label for="client" class="field-label text-muted fs18 mb10">
                    {!! trans('validation.attributes.theme') !!}
                </label>

                {!! Form::select('ticket_id', $theme, null, ['class'=> 'form-control']) !!}
            </div>

        </div>

        <div class="section row">

            <div class="col-md-12">
                {!! Field::textarea('problem', ['class' => 'form-control', 'ph' => trans('validation.attributes.problem'), 'max' => '255']) !!}
            </div>

        </div>

    @else

        <div class="section row">
            <div class="col-md-12">
                {!! Field::textarea('problem', ['class' => 'form-control', 'ph' => trans('validation.attributes.problem'), 'max' => '255', 'disabled']) !!}
            </div>
        </div>

        <div class="section row">
            <div class="col-md-12">
                {!! Field::textarea('answer', ['class' => 'form-control', 'ph' => trans('validation.attributes.answer'), 'max' => '255', 'disabled']) !!}
            </div>
        </div>

    @endif

@endcan

@can('admin')

    <div class="section row">

        <div class="col-md-12">
            {!! Field::textarea('problem', ['class' => 'form-control', 'ph' => trans('validation.attributes.problem'), 'max' => '255', 'disabled']) !!}
        </div>

    </div>

    <div class="section row">
        <div class="col-md-12">
            {!! Field::textarea('answer', ['class' => 'form-control', 'ph' => trans('validation.attributes.answer'), 'max' => '255']) !!}
        </div>
    </div>

@endcan

@if(isset($theme))
<div class="section row mbn">
    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-danger']) !!}
        </p>
    </div>
</div>
@endif

@can('admin')
    <div class="section row mbn">
        <div class="col-sm-12">
            <p class="text-right">
                {!! Form::submit($button, ['class' => 'btn btn-danger']) !!}
            </p>
        </div>
    </div>
@endcan