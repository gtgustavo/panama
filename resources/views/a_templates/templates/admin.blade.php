<!doctype html>

<html lang="es">

    <head>

        @include('a_templates.partials.head')

        @include('a_templates.partials.style')

    </head>

    <body class="ecommerce-page">

        <!-- Start: Theme Preview Pane -->
        @include('a_templates.extras.theme_preview_pane')
        <!-- End: Theme Preview Pane -->

        <!-- Start: Main -->
        <div id="main">

            <!-- Start: Header -->
            @include('a_templates.extras.header')
            <!-- End: Header -->

            <!-- Start: Sidebar -->
            @include('a_templates.extras.aside')
            <!-- End: Sidebar -->

            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">

                <!-- Start: Topbar-Dropdown -->
                @include('a_templates.extras.top_bar_dropdown')
                <!-- End: Topbar-Dropdown -->

                @yield('header_menu')

                @yield('content')

            </section>
            <!-- End: Content-Wrapper -->

        </div>
        <!-- End: Main -->

        <!-- Start: Java Script -->
        @include('a_templates.partials.script')
        <!-- End: Java Script -->

    </body>

</html>