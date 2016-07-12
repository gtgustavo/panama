@section('style')

    <style>
        /* demo slider styles */
        .slick-slide h1 {
            background: #FFF;
            border: 2px solid #404040;
            height: 200px;
            width: 200px;
            line-height: 190px;
            margin: 5px;
            text-align: center;
            font-weight: 600;
            font-size: 32px;
            color: #3498db;
        }
        .center-mode h1 {
            opacity: 0.8;
            transition: all 300ms ease;
        }
        .center-mode .slick-center h1 {
            color: #e67e22;
            opacity: 1;
            -webkit-transform: scale(1.08);
            transform: scale(1.08);
        }
    </style>

@endsection

<div class="row">

    <div class="slick-responsive">

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador1.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador2.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador3.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador4.jpg"/>
            </h1>
        </div>

        <!-- repeat -->

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador1.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador2.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador3.jpg"/>
            </h1>
        </div>

        <div class="slick-slide">
            <h1>
                <img src="/../assets/img/slider/mini/rotador4.jpg"/>
            </h1>
        </div>

    </div>

</div>