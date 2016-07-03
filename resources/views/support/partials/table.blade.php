<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.support.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>

                        @can('admin')
                            <th class="">{!! trans('front.form.support.table.name') !!}     </th>
                            <th class="">{!! trans('front.form.support.table.dni') !!}    </th>
                        @endcan

                        <th class="">{!! trans('front.form.support.table.theme') !!}     </th>
                        <th class="">{!! trans('front.form.support.table.status') !!}    </th>
                        <th class="">{!! trans('front.form.support.table.date') !!} </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($help as $support)

                        <tr>
                            <td class=""> {{ $support->id }}                              </td>

                            @can('admin')
                                <td class=""> {{ $support->client->people->full_name }}                   </td>
                                <td class=""> {{ $support->client->people->dni }}                          </td>
                            @endcan

                            <td class=""> {{ $support->ticket->theme }}                   </td>
                            <td class=""> {{ $support->status }}                          </td>
                            <td class=""> {{ $support->created_at->format('d / m / Y') }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    @can('admin')
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('answer_create',   [$support->id]) }}">{!! trans('front.form.actions.answer') !!}</a>
                                            </li>
                                        </ul>
                                    @endcan

                                    @can('client')
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('support_answer',  [$support->id]) }}">{!! trans('front.form.actions.answer') !!}</a>
                                            </li>
                                        </ul>
                                    @endcan

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                <tr class="bg-light">
                    <th class="">ID</th>

                    @can('admin')
                        <th class="">{!! trans('front.form.support.table.name') !!}     </th>
                        <th class="">{!! trans('front.form.support.table.dni') !!}    </th>
                    @endcan

                    <th class="">{!! trans('front.form.support.table.theme') !!}     </th>
                    <th class="">{!! trans('front.form.support.table.status') !!}   </th>
                    <th class="">{!! trans('front.form.support.table.date') !!} </th>
                    <th class=""></th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>