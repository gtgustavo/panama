@extends('a_templates.templates.admin')

@section('header_menu')

    @include('panel.partials.header')

@endsection

@section('content')

    <section id="content" class="animated fadeIn">

        @include('panel.partials.presentation')

        @include('a_templates.partials.messages')

        <div class="row">

            <div class="col-md-12">

                <div class="tab-block">

                    <div class="tab-content p30">

                        {!! Form::open(['route' => 'panel_password', 'method' => 'POST', 'class' => 'form-login']) !!}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('panel.partials.field_password', ['button' => trans('front.form.actions.edit')])

                        {!! Form::Close() !!}


                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection