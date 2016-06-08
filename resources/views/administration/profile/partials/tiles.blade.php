<div class="row">
    <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
            <div class="panel-body">
                <h1 class="fs30 mt5 mbn"> {{ $cant_profiles }} </h1>
                <h6 class="text-system">  {!! trans('front.form.profile.tile.profiles') !!} </h6>
            </div>
            <div class="panel-footer br-t p12">
                <!--
                <span class="fs11">
                    <i class="fa fa-arrow-up pr5"></i> 3% INCREASE
                    <b>1W AGO</b>
                </span>
                -->
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
            <div class="panel-body">
                <h1 class="fs30 mt5 mbn"> {{ $roles }} </h1>
                <h6 class="text-success"> {!! trans('front.form.profile.tile.roles') !!} </h6>
            </div>
            <div class="panel-footer br-t p12">

            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
            <div class="panel-body">
                <h1 class="fs30 mt5 mbn"> {{ $users }} </h1>
                <h6 class="text-warning"> {!! trans('front.form.profile.tile.users') !!} </h6>
            </div>
            <div class="panel-footer br-t p12">

            </div>
        </div>
    </div>
</div>