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

                        {!! Form::model($user->toArray() + $people->toArray(), ['route' => ['panel_update', $user, $people], 'method' => 'PUT']) !!}

                        @include('administration.employee.partials.fields', ['button' => trans('front.form.actions.edit')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection