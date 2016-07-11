<div class="col-md-4">

    {!! Form::select('change_status', config('options.status_package'), null, ['class' => 'form-control', 'id' => 'change_status']) !!}

</div>

<button type="button" class="btn orange btn-status" > {!! trans('front.form.button.status') !!} </button>

