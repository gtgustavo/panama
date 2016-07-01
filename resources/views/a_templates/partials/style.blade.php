<!-- Font CSS -->
{!! Html::style('assets/font_css.css') !!}

<!-- Theme CSS -->
{!! Html::style('assets/skin/default_skin/css/theme.css') !!}

<!-- Admin Forms CSS -->
{!! Html::style('assets/admin-tools/admin-forms/css/admin-forms.css') !!}

<!-- Favicon -->
<link href="{!! asset('assets/img/favicon.ico') !!}" rel="shortcut icon">

<!-- Select Multiple -->
{!! Html::style('assets/select-multiple/multi-select.css') !!}

<!-- Tables Dynamic -->
{!! Html::script('assets/js/app/dynamic_table/dataTables.bootstrap.min.css') !!}

<!-- Slider -->
{!! Html::style('assets/js/app/slider/slider.css') !!}

@yield('style')