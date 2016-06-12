<!doctype html>

<html lang="es">

    <head>

        @include('a_templates.partials.head')

        @include('a_templates.partials.style')

    </head>

    <body class="external-page sb-l-c sb-r-c">

        <!-- Start: Main -->
        <div id="main" class="animated fadeIn">

            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">

                <!-- begin canvas animation bg -->
                <div id="canvas-wrapper">
                    <canvas id="demo-canvas"></canvas>
                </div>

                <!-- Begin: Content -->
                <section id="content" class="animated fadeIn">

                    @yield('content')

                    @include('a_templates.partials.script')

                </section>
                <!-- End: Content -->

            </section>
            <!-- End: Content-Wrapper -->

        </div>
        <!-- End: Main -->

    </body>

</html>