@extends('a_templates.templates.login_template')

@section('content')

    <div class="admin-form theme-info mw700" id="login1">

        @include('auth.partials.logo')

        <div class="panel panel-info mt10 br-n">

            @include('auth.partials.social_networks')

                {!! Form::open(['route' => 'new_client', 'method' => 'POST', 'class' => 'form-login']) !!}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="panel-body p25 bg-light">

                        <div class="section-divider mt10 mb40">
                            <span> {!! trans('front.form.button.sign_up') !!} </span>
                        </div>

                        @include('system.client.partials.fields')

                    </div>

                    @include('auth.partials.footer_register')

                {!! Form::Close() !!}

        </div>

    </div>

@endsection

@section('script')

    {!! Html::script('assets/js/app/CanvasBG.js') !!}

@endsection