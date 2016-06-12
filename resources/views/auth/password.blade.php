@extends('a_templates.templates.login_template')

@section('content')

    <div class="admin-form theme-info mw500" id="login">

        @include('auth.partials.logo')

        @include('a_templates.partials.messages')

        <div class="panel panel-info heading-border br-n">

            {!! Form::open(['route' => 'password', 'method' => 'POST', 'class' => 'form-login']) !!}

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-footer p25 pv15">

                    <div class="section">
                        {!! Field::email('email',       ['class' => 'gui-input', 'ph' => trans('validation.attributes.email')]) !!}
                    </div>

                    <input type="submit" class="button btn-primary" value="{!! trans('front.form.button.reset') !!}">

                </div>

            {!! Form::Close() !!}

        </div>

    </div>

@endsection

@section('script')

    {!! Html::script('assets/js/app/CanvasBG.js') !!}

@endsection