<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.ticket.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system">ID</th>
                        <th class="system">{!! trans('front.form.ticket.table.theme') !!}     </th>
                        <th class="system">{!! trans('front.form.ticket.table.pending') !!}   </th>
                        <th class="system">{!! trans('front.form.ticket.table.responded') !!} </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($tickets as $ticket)

                        <tr>
                            <td class=""> {{ $ticket->id }}                                   </td>
                            <td class=""> {{ $ticket->theme }}                                </td>
                            <td class=""> {{ $ticket->pendingCount->first()['aggregate'] }}   </td>
                            <td class=""> {{ $ticket->respondedCount->first()['aggregate'] }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn orange br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('ticket_edit',   [$ticket->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('ticket_delete', [$ticket->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                <tr class="bg-light">
                    <th class="system">ID</th>
                    <th class="system">{!! trans('front.form.ticket.table.theme') !!}     </th>
                    <th class="system">{!! trans('front.form.ticket.table.pending') !!}   </th>
                    <th class="system">{!! trans('front.form.ticket.table.responded') !!} </th>
                    <th class="system"></th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>