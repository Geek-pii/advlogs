@if ($carrierLoad)
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th class="w-25">{!! trans('admin_carrier_load.table.company') !!}:</th>
                    <td>{{ $carrierLoad->company->company_legal_name }}</td>
                </tr>
                <tr>
                    <th>{!! trans('admin_carrier_load.table.equipment_capacity') !!}:</th>
                    <td>
                        <button class="btn btn-primary" id="view-equipment">View</button>
                    </td>
                </tr>
                <tr>
                    <th>{!! trans('admin_carrier_load.table.vehicle_types') !!}:</th>
                    <td>
                        <button class="btn btn-primary" id="vehicle-type">View</button>
                    </td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="true">
                    <th>{!! trans('admin_carrier_load.table.routes') !!}:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>{!! trans('admin_carrier_load.table.no_future_loads') !!}:</th>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="no_future_loads"
                                id="no_future_loads_yes" value="Y"
                                @if ($carrierLoad && $carrierLoad->no_future_loads == '1') checked @endif>
                            <label class="form-check-label" for="no_future_loads_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="no_future_loads"
                                id="no_future_loads_no" value="N" @if ($carrierLoad && $carrierLoad->no_future_loads == '0') checked @endif>
                            <label class="form-check-label" for="no_future_loads_no">No</label>
                        </div>
                    </td>
                </tr>
                <tr class="expandable-body p-1">
                    <td colspan="2">
                        @php $routes = $carrierLoad ? $carrierLoad->routes : []; @endphp
                        <admin-company-list-route :base-carrier-load="{{ json_encode($carrierLoad) }}"
                            :base-routes="{{ json_encode($routes) }}"
                            :base-route-regions="{{ json_encode(config('data.route_regions')) }}"
                            :base-route-radius="{{ json_encode(config('data.route_radius')) }}" />

                    </td>
                </tr>
                <tr>
                    <th>{!! trans('admin_carrier_load.table.load_offers') !!}:</th>
                    <td><button class="btn btn-primary" id="load-offers">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('admin.company.carrier_load.equipment_modal', ['loads' => $carrierLoad])
    @include('admin.company.carrier_load.vehicle_type_modal', ['loads' => $carrierLoad])
    @include('admin.company.carrier_load.load_offer_modal', ['loads' => $carrierLoad])
@else
    <div>
        No Carrier Load Found
    </div>
@endif
