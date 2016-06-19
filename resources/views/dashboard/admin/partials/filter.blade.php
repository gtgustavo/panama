<div align="right">

    {!! Form::model(Request::all(), ['route' => 'home', 'method' => 'GET', 'class' => 'navbar-form', 'role' => 'search']) !!}

    <div class="form-group">

        {!! Form::text('wr', null, ['class' => 'form-control', 'placeholder' => 'WR']) !!}

        {!! Form::select('status', config('options.status_package'), null, ['class' => 'form-control']) !!}

    </div>

    {!! Form::submit(trans('front.form.button.search'), ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

</div>