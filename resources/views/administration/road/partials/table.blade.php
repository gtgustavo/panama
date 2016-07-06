<!-- recent activity table -->
<div class="panel">



    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system">ID</th>
                        <th class="system">{!! trans('front.form.road.table.name') !!}     </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($roads as $road)

                        <tr>
                            <td class=""> {{ $road->id }}   </td>
                            <td class=""> {{ $road->road }} </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('road_edit',   [$road->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('road_delete', [$road->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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
                    <th class="system">{!! trans('front.form.road.table.name') !!}     </th>
                    <th class="system"></th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>