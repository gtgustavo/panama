<li class="dropdown">

    @if(Auth::user()->file == 'true')

        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="/../assets/img/avatars/{{ Auth::User()->id }}.jpg" alt="avatar" class="mw30 br64 mr15"> {{ Auth::User()->people->full_name }}
            <span class="caret caret-tp hidden-xs"></span>
        </a>
    @else

        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="/../assets/img/avatars/default.png" alt="avatar" class="mw30 br64 mr15"> {{ Auth::User()->people->full_name }}
            <span class="caret caret-tp hidden-xs"></span>
        </a>
    @endif

    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">

        <li class="list-group-item">
            <a href="{{ route('panel_home') }}" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> {!! trans('front.form.button.account_settings') !!} </a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('logout') }}" class="animated animated-short fadeInUp">
                <span class="fa fa-power-off"></span> {!! trans('front.form.button.logout') !!} </a>
        </li>

    </ul>

</li>