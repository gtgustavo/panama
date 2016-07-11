<div align="right">

    {!! Form::model(Request::all(), ['route' => 'answer_home', 'method' => 'GET', 'class' => 'navbar-form', 'role' => 'search']) !!}

    <div class="form-group">

        {!! Form::select('search', $theme, null, ['class' => 'form-control']) !!}

    </div>

    {!! Form::submit(trans('front.form.button.search'), ['class' => 'btn orange']) !!}

    {!! Form::close() !!}

</div>