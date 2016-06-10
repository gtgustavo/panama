<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">

        <span class="panel-title hidden-xs"> {!! trans('front.form.consigning.title') !!} </span>

        -- {{ $client->full_name }}

        -- {!! trans('front.form.paginate.page') !!} {{ $consigning->currentPage() }} {!! trans('front.form.paginate.of') !!} {{ $consigning->lastPage() }}.

    </div>

    <div class="panel-body pn">

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.consigning.table.country') !!}         </th>
                        <th class="">{!! trans('front.form.consigning.table.province') !!}        </th>
                        <th class="">{!! trans('front.form.consigning.table.city') !!}            </th>
                        <th class="">{!! trans('front.form.consigning.table.postal_code') !!}     </th>
                        <th class="">{!! trans('front.form.consigning.table.reference_point') !!} </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($consigning as $consign)

                        <tr>
                            <td class=""> {{ $consign->id }}              </td>
                            <td class=""> {{ $consign->country }}         </td>
                            <td class=""> {{ $consign->province }}        </td>
                            <td class=""> {{ $consign->city }}            </td>
                            <td class=""> {{ $consign->postal_code }}     </td>
                            <td class=""> {{ $consign->reference_point }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('consigning_edit',   [$client, $consign->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('consigning_delete', [$client, $consign->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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

        {!! $consigning->appends(Request::only(['name', 'type']))->render() !!}

    </div>

</div>