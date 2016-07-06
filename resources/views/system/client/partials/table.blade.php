<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.client.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.client.table.name') !!}             </th>
                        <th class="">{!! trans('front.form.client.table.dni') !!}              </th>
                        <th class="">{!! trans('front.form.client.table.country') !!}          </th>
                        <th class="">{!! trans('front.form.client.table.phone_c') !!}          </th>
                        <th class="">{!! trans('front.form.client.table.consigning') !!}       </th>
                        <th class="">{!! trans('front.form.client.table.reception_center') !!} </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($clients as $client)

                        <tr>
                            <td class=""> {{ $client->id }}                  </td>
                            <td class=""> {{ $client->people->full_name }}   </td>
                            <td class=""> {{ $client->people->dni }}         </td>
                            <td class=""> {{ $client->people->province->country->name }}     </td>
                            <td class=""> {{ $client->people->phone_h }}     </td>
                            <td class=""> {{ $client->consigning->count() }} </td>
                            <td class=""> {{ $client->reception->name }}     </td>

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
                                            <a href="{{ route('client_edit',     [$client->id, $client->people_id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('client_delete',   [$client->id, $client->people_id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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
                        <th class="">{!! trans('front.form.client.table.name') !!}             </th>
                        <th class="">{!! trans('front.form.client.table.dni') !!}              </th>
                        <th class="">{!! trans('front.form.client.table.country') !!}          </th>
                        <th class="">{!! trans('front.form.client.table.phone_c') !!}          </th>
                        <th class="">{!! trans('front.form.client.table.consigning') !!}       </th>
                        <th class="">{!! trans('front.form.client.table.reception_center') !!} </th>
                        <th class=""></th>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>