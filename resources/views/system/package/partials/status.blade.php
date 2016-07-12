<div class="col-md-4">

    @if(Auth::user()->profile_id == 4) <!-- empleado centro de recepcion -->

        {!! Form::select('change_status', config('options.change_status_center'), null, ['class' => 'form-control', 'id' => 'change_status']) !!}

    @elseif(Auth::user()->profile_id == 5) <!-- empleado centro de embarque -->

        {!! Form::select('change_status', config('options.change_status_shipment'), null, ['class' => 'form-control', 'id' => 'change_status']) !!}

    @elseif(Auth::user()->profile_id == 6) <!-- empleado pais destino -->

        {!! Form::select('change_status', config('options.change_package_received'), null, ['class' => 'form-control', 'id' => 'change_status']) !!}

    @else

        {!! Form::select('change_status', config('options.status_package_client'), null, ['class' => 'form-control', 'id' => 'change_status']) !!}

    @endif

</div>

<button type="button" class="btn orange btn-status" > {!! trans('front.form.button.status') !!} </button>

