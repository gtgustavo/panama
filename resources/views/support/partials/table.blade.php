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
                            <td class=""> {{ $support->ticket->theme }}                   </td>
                            <td class=""> {{ $support->status }}                          </td>
                            <td class=""> {{ $support->created_at->format('d / m / Y') }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('support_home',   [$support->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('support_home', [$support->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                <tr class="bg-light">
                    <th class="">ID</th>
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