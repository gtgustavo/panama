<div align="right">

    {!! Form::model(Request::all(), ['route' => 'dashboard_client', 'method' => 'GET', 'class' => 'navbar-form', 'role' => 'search']) !!}

    <div class="form-group">

        {!! Form::select('status', config('options.status_package_client'), null, ['class' => 'form-control']) !!}

    </div>

    {!! Form::submit(trans('front.form.button.search'), ['class' => 'btn orange']) !!}

    {!! Form::close() !!}

</div>