<div class="section row">

    {!! Form::select('role_id[]', $roles, isset($profile_role) ? $profile_role : null, array(
    'multiple' => true, 'class' => 'multi-select', 'id' => 'custom-headers')) !!}

</div>

<div class="section row mbn">

    <div class="col-sm-12">
        <p class="text-right">
            {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        </p>
    </div>
</div>

@section('script')

    <script>
        $('#custom-headers').multiSelect({
            selectableHeader: "<div class='custom-header'> {!! trans('front.form.profile.select.available') !!} </div>",
            selectionHeader:  "<div class='custom-header'> {!! trans('front.form.profile.select.config') !!}    </div>",
            selectableFooter: "<div class='custom-header'> {!! trans('front.form.profile.select.available') !!} </div>",
            selectionFooter:  "<div class='custom-header'> {!! trans('front.form.profile.select.config') !!}    </div>"
        });
    </script>

@endsection