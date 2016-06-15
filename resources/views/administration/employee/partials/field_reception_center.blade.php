<div class="col-md-6">
    <label for="client" class="field-label text-muted fs18 mb10">
        {!! trans('validation.attributes.reception') !!}
    </label>

    {!! Form::select('reception_id', $reception_center, isset($employee->reception_id) ? $employee->reception_id : null, ['class'=> 'gui-input']) !!}
</div>