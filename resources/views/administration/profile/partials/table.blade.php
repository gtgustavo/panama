<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">

        <span class="panel-title hidden-xs"> {!! trans('front.form.profile.title') !!} </span>   --

        {!! trans('front.form.paginate.page') !!} {{ $profiles->currentPage() }} {!! trans('front.form.paginate.of') !!} {{ $profiles->lastPage() }}.

    </div>

    <div class="panel-body pn">

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.profile.table.profile') !!}     </th>
                        <th class="">{!! trans('front.form.profile.table.description') !!} </th>
                        <th class="">{!! trans('front.form.profile.table.roles') !!}       </th>
                        <th class="">{!! trans('front.form.profile.table.employees') !!}   </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($profiles as $profile)

                        <tr>
                            <td class=""> {{ $profile->id }}            </td>
                            <td class=""> {{ $profile->name }}          </td>
                            <td class=""> {{ $profile->description }}   </td>
                            <td><strong>  {{ count($profile->roles) }}  </strong> {{ trans('front.form.profile.table.roles') }}     </td>
                            <td><strong>  {{ count($profile->users) }}  </strong> {{ trans('front.form.profile.table.employees') }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('profile_config', [$profile->id]) }}">{!! trans('front.form.actions.config') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('profile_edit',   [$profile->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('profile_delete', [$profile->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div align="center">

        {!! $profiles->render() !!}

    </div>

</div>