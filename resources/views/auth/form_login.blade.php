@extends('a_templates.templates.login_template')

@section('content')

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    @include('auth.partials.logo_and_redirect')

                    <div class="panel panel-info mt10 br-n">

                        @include('auth.partials.social_networks')

                        {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-login']) !!}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('auth.partials.fields')

                            @include('auth.partials.footer_login')

                        {!! Form::Close() !!}

                    </div>

                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>

@endsection

@section('script')

    <script>
        jQuery(document).ready(function() {

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });

        });
    </script>

@endsection