<div class="section row">

    <div class="col-md-6">
        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.profile') !!}
        </label>

        {!! Form::select('profile_id', $profile, isset($employee->profile_id) ? $employee->profile_id : null, ['class'=> 'gui-input']) !!}
    </div>

</div>