<div class="section row">

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.country_o') !!}
        </label>

        {!! Form::select('origin_id', $country, isset($road->origin_id) ? $road->origin_id : null, ['class'=> 'form-control']) !!}

    </div>

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.country_d') !!}
        </label>

        {!! Form::select('destination_id', $country, isset($road->destination_id) ? $road->destination_id : null, ['class'=> 'form-control']) !!}

    </div>

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>