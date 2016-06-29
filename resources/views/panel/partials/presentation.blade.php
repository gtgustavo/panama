<!-- Begin .page-heading -->
<div class="page-heading">

    <div class="media clearfix">

        <div class="media-left pr30">
            <a href="{{ route('panel_image') }}">

                @if(Auth::user()->file == 'true')

                    <img class="media-object mw150" src="/../assets/img/avatars/{{ Auth::User()->id }}.jpg" alt="">
                @else

                    <img class="media-object mw150" src="/../assets/img/avatars/default.png" alt="">
                @endif

            </a>
        </div>

        <div class="media-body va-m">

            <h2 class="media-heading"> {{ Auth::User()->people->full_name }} </h2>

        </div>

    </div>

</div>