<div class="section row">

    <div class="col-md-6">
        {!! Field::text('first_name', ['class' => 'gui-input', 'ph' => trans('validation.attributes.first_name'), 'max' => '30']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('last_name',  ['class' => 'gui-input', 'ph' => trans('validation.attributes.last_name'),  'max' => '30']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('dni',    ['class' => 'gui-input', 'ph' => trans('validation.attributes.dni'),  'max' => '15']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::email('email', ['class' => 'gui-input', 'ph' => trans('validation.attributes.email'), 'max' => '30']) !!}
    </div>

</div>

@if(! Auth::check())

    @include('administration.employee.partials.field_password')

@endif

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('phone_c', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_c'), 'max' => '15']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('phone_h', ['class' => 'gui-input', 'ph' => trans('validation.attributes.phone_h'), 'max' => '15']) !!}
    </div>

</div>

<div class="section row">

    <div class="col-md-6">

        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.country') !!}
        </label>

        <select name="country_id" id="country" class="form-control" required>

            <option value=""> {!! trans('front.form.element.option') !!} </option>

            @foreach($country as $data)

                <option value="{!! $data->id !!}"> {!! $data->name !!} </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-6">
        <label for="client" class="field-label text-muted fs18 mb10">
            {!! trans('validation.attributes.province') !!}
        </label>

        <select name="province_id" id="province" class="form-control" required></select>
    </div>

</div>

<div class="section row">

    <div class="col-md-6">
        {!! Field::text('city',        ['class' => 'gui-input', 'ph' => trans('validation.attributes.city'),        'max' => '30']) !!}
    </div>

    <div class="col-md-6">
        {!! Field::text('postal_code', ['class' => 'gui-input', 'ph' => trans('validation.attributes.postal_code'), 'max' => '10']) !!}
    </div>

</div>

<div class="section">
    {!! Field::text('address', ['class' => 'form-control', 'ph' => trans('validation.attributes.address'), 'max' => '150']) !!}
</div>

<!-- Protection user admin -->

<div class="section row">

    @if(isset($employee->profile_id))

        @if($employee->profile_id > 3)

            @include('administration.employee.partials.field_profile')

            @include('administration.employee.partials.field_reception_center')

        @endif

    @else

        @if($isEmployee)

            @include('administration.employee.partials.field_profile')

            @include('administration.employee.partials.field_reception_center')

        @endif

    @endif

</div>


@if(Auth::check())

    <div class="section row mbn">

        <div class="col-sm-12">
            <p class="text-right">
                {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
            </p>
        </div>
    </div>

@endif

@section('script')

    @include('administration.employee.partials.ajax_country')

@endsection