<div class="section row">

    <div class="col-md-6">
        {!! Form::label('profile', trans('validation.attributes.profile')) !!}

        {!! Form::select('profile_id', $profile, isset($employee->profile_id) ? $employee->profile_id : null, ['class'=> 'gui-input']) !!}
    </div>

</div>