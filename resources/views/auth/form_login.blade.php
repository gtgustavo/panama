@extends('a_templates.templates.login_template')

@section('content')

    <div class="admin-form theme-info" id="login1">

        @include('auth.partials.logo')

        <div class="panel panel-info mt10 br-n">

            @include('auth.partials.social_networks')

            {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-login']) !!}

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('auth.partials.fields')

                @include('auth.partials.footer_login')

            {!! Form::Close() !!}

        </div>

    </div>

@endsection

@section('script')

    {!! Html::script('assets/js/app/CanvasBG.js') !!}

@endsection