<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">

        <span class="panel-title hidden-xs"> {!! trans('front.form.client.title') !!} </span>   --

        {!! trans('front.form.paginate.page') !!} {{ $clients->currentPage() }} {!! trans('front.form.paginate.of') !!} {{ $clients->lastPage() }}.

    </div>

    <div class="panel-body pn">

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.client.table.name') !!}    </th>
                        <th class="">{!! trans('front.form.client.table.dni') !!}     </th>
                        <th class="">{!! trans('front.form.client.table.email') !!}   </th>
                        <th class="">{!! trans('front.form.client.table.profile') !!} </th>
                        <th class="">{!! trans('front.form.client.table.phone_c') !!} </th>
                        <th class="">{!! trans('front.form.client.table.phone_h') !!} </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($clients as $client)

                        <tr>
                            <td class=""> {{ $client->id }}            </td>
                            <td class=""> {{ $client->full_name }}     </td>
                            <td class=""> {{ $client->dni }}           </td>
                            <td class=""> {{ $client->email }}         </td>
                            <td class="">
                                @foreach($client->profile as $profile)
                                    {{ $profile->name }}
                                @endforeach
                            </td>
                            <td class=""> {{ $client->phone_c }}        </td>
                            <td class=""> {{ $client->phone_h }}        </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('consigning_home', [$client->id]) }}">{!! trans('front.form.actions.consigning') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('client_edit',     [$client->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('client_delete',   [$client->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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

        {!! $clients->appends(Request::only(['name', 'type']))->render() !!}

    </div>

</div>