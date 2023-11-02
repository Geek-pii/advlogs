      <h6 class="text-center mt-2 mb-2"><a style="cursor: pointer" class="border-primary" id="route-instruction">Instructions</a>
</h6>
@php
    $routes = $loads ? $loads->routes : [];
@endphp
<form id="add_route_form" class="m-0">
    <div class="d-sm-flex justify-content-between">
        <div id="origin-box" class="border border-secondary mb-3 mb-md-0 col-md-6 pl-0 pr-0 mr-sm-2">
            <div class="route-header-box">
                <div class="font-weight-bold pr-2">
                    Origin
                </div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_origin" value="region_search"
                            checked="checked">
                        <label class="form-check-label" for="search_origin">Tap one or more origin regions or
                            states:</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_origin" value="city_search">
                        <label class="form-check-label" for="search_origin">City Search</label>
                    </div>
                </div>
            </div>
            <div class="region_search">
                <h6>Select One Area:</h6>
                <input type="hidden" name="origin_area">
                <div class="region_box">
                    @foreach (config('data.route_regions') as $key => $region)
                        <div class="col-md-12 mb-1" data-selected-value="{{ $region['value'] }}">
                            {{ $region['label'] }}
                        </div>
                    @endforeach
                </div>
                <div id="origin_area-error" class="error" style="display: none">Please select one of the area.</div>
            </div>
            <div class="city_search hidden p-2">
                <div class="form-group shadow-none">
                    <small>* City</small>
                    <input type="text" class="form-control city_address" name="origin_city" placeholder="City">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <small>State</small>
                        <input type="text" name="origin_state" class="form-control state" placeholder="state">
                    </div>
                    <div class="form-group  ml-1 mr-1">
                        <small> Postal Code </small>
                        <input type="text" name="origin_zip" class="form-control zip_code" placeholder="Postal Code">
                    </div>
                    <div class="form-group">
                        <small target="radius"> *Radius </small>
                        <select class="form-control" name="origin_radius">
                            @foreach (config('data.route_radius') as $key => $option)
                                <option @if ($key == 100) selected="selected" @endif
                                    value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="dest-box" class="border border-secondary col-md-6 pl-0 pr-0">
            <div class="route-header-box">
                <div class="font-weight-bold pr-2">
                    Destination
                </div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_dest" value="region_search">
                        <label class="form-check-label" for="search_dest">Tap one or more destination regions or
                            states:</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_dest" value="city_search"
                            checked="checked">
                        <label class="form-check-label" for="search_dest">City Search</label>
                    </div>
                </div>
            </div>
            <div class="region_search hidden">
                <h6>Select One Area:</h6>
                <input type="hidden" name="dest_area">
                <div class="region_box">
                    @foreach (config('data.route_regions') as $key => $region)
                        <div class="col-md-12 mb-1" data-selected-value="{{ $region['value'] }}">
                            {{ $region['label'] }}
                        </div>
                    @endforeach
                </div>
                <div id="dest_area-error" class="error" style="display: none">Please select one of the area.</div>
            </div>
            <div class="city_search p-2">
                <div class="form-group shadow-none">
                    <small>* City</small>
                    <input type="text" class="form-control city_address" name="dest_city" placeholder="City">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <small>State</small>
                        <input type="text" name="dest_state" class="form-control state" placeholder="state">
                    </div>
                    <div class="form-group ml-1 mr-1">
                        <small> Postal Code </small>
                        <input type="text" name="dest_zip" class="form-control zip_code" placeholder="State">
                    </div>
                    <div class="form-group">
                        <small target="radius"> *Radius </small>
                        <select class="form-control" name="dest_radius">
                            @foreach (config('data.route_radius') as $key => $option)
                                <option value="{{ $key }}"
                                    @if ($key == 100) selected="selected" @endif>{{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<form id="form-step-3" class="m-0 p-0 w-100" style="font-size: 12px">
    <input type="hidden" value="3" name="step" />
    <div class="col-12 pl-0 mt-2">
        <div class="boxes">
            <input type="checkbox" name="no_future_loads" 
            @if ($loads && $loads->no_future_loads)
                checked="checked"
            @endif
            id="no_future_loads">
        <label for="no_future_loads" class="text-dark">
            <small>I only want this load. I’m not interested in future loads in my usual working areas</small>
        </label>
        </div>
    </div>
    <div class="col-md-12 text-right add_route mb-2 mt-2">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Route
    </div>
    @if ($routes)
        <input type="hidden" class="step_3_max_step" value="{{ count($routes) }}" />
        @foreach ($routes as $routeIndex => $route)
            <div class="d-flex route_box bg-secondary radius_20 border border-dark mb-2"
                data-index="{{ $routeIndex }}">
                <div class="align-self-center">
                    <strong style="writing-mode: vertical-lr;
                    transform: rotate(180deg);">Route
                        {{ $routeIndex + 1 }}</strong>
                </div>
                <div class="flex-grow-1 bg-white radius_right_20 border-0 p-2">
                    <div class="d-flex">
                        <div class="title" style="width: 80px"><strong>Origin</strong></div>
                        <div class="content"><span class="origin-display-value">
                                @if ($route['search_origin'] == 'region_search')
                                    {{ join(', ', $route['origin_area']) }}
                                @else
                                    {{ join(', ', [$route['origin_city'], $route['origin_state'], $route['origin_radius']]) }}
                                @endif
                            </span>
                        </div>
                        <div class="tail ml-auto">
                            <i class="fa fa-pencil-square-o fa-2x" data-index="{{ $routeIndex }}"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="title" style="width: 80px"><strong>Destination</strong></div>
                        <div class="content"><span class="dest-display-value">
                                @if ($route['search_dest'] == 'region_search')
                                    {{ join(', ', $route['dest_area']) }}
                                @else
                                    {{ join(', ', [$route['dest_city'], $route['dest_state'], $route['dest_radius']]) }}
                                @endif
                            </span>
                        </div>
                        <div class="tail ml-auto"></div>
                    </div>
                    <div class="d-flex">
                        <div class="title" style="width: 80px"></div>
                        <div class="content d-flex align-items-center">
                            <div class="pricing-switcher float-none transport-speed">
                                <p class="fieldset p-0 m-0">
                                    <input type="radio" name="direction[{{ $routeIndex }}]" value="Both"
                                        id="direction_both_{{ $routeIndex }}"
                                        @if ($route['direction'] == 'Both') checked @endif />
                                    <label for="direction_both_{{ $routeIndex }}">Both Directions</label>
                                    <input type="radio" name="direction[{{ $routeIndex }}]" value="One"
                                        id="direction_one_{{ $routeIndex }}"
                                        @if ($route['direction'] == 'One') checked @endif />
                                    <label for="direction_one_{{ $routeIndex }}">One Direction Only</label>
                                    <span class="switch"></span>
                                </p>
                            </div>
                        </div>
                        <div class="tail ml-auto"></div>
                    </div>
                    <div class="d-flex">
                        <div class="title" style="width: 80px"></div>
                        <div class="content d-flex align-items-center">
                            Get Notification
                            <div class="pricing-switcher float-none">
                                <p class="fieldset p-0 m-0">
                                    <input type="radio" name="notification[{{ $routeIndex }}]" value="Yes"
                                        id="notification_yes_{{ $routeIndex }}"
                                        @if ($route['notification'] == 'Yes') checked @endif />
                                    <label for="notification_yes_{{ $routeIndex }}">Yes</label>
                                    <input type="radio" name="notification[{{ $routeIndex }}]" value="No"
                                        id="notification_no_{{ $routeIndex }}"
                                        @if ($route['notification'] == 'No') checked @endif />
                                    <label for="notification_no_{{ $routeIndex }}">No</label>
                                    <span class="switch"></span>
                                </p>
                            </div>
                        </div>
                        <div class="tail ml-auto"><i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="hidden" class="search_origin" name="search_origin[{{ $routeIndex }}]"
                        value="{{ $route['search_origin'] }}">
                    <input type="hidden" name="origin_area[{{ $routeIndex }}]"
                        value='{{ json_encode($route["origin_area"]) }}'>
                    <input type="hidden" name="origin_city[{{ $routeIndex }}]"
                        value="{{ $route['origin_city'] }}">
                    <input type="hidden" name="origin_state[{{ $routeIndex }}]"
                        value="{{ $route['origin_state'] }}">
                    <input type="hidden" name="origin_zip[{{ $routeIndex }}]"
                        value="{{ $route['origin_zip'] }}">
                    <input type="hidden" name="origin_radius[{{ $routeIndex }}]"
                        value="{{ $route['origin_radius'] }}">
                    <input type="hidden" name="search_dest[{{ $routeIndex }}]"
                        value="{{ $route['search_dest'] }}">
                    <input type="hidden" name="dest_area[{{ $routeIndex }}]" value='{{ json_encode($route["dest_area"]) }}'>
                    <input type="hidden" name="dest_city[{{ $routeIndex }}]" value="{{ $route['dest_city'] }}">
                    <input type="hidden" name="dest_state[{{ $routeIndex }}]"
                        value="{{ $route['dest_state'] }}">
                    <input type="hidden" name="dest_zip[{{ $routeIndex }}]" value="{{ $route['dest_zip'] }}">
                    <input type="hidden" name="dest_radius[{{ $routeIndex }}]"
                        value="{{ $route['dest_radius'] }}">
                </div>
            </div>
        @endforeach
    @endif
</form>
<div class="modal" tabindex="-1" id="edit-route">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Route</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row ml-0 mr-0" id="edit-route-form">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-route">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="router-instruction-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Instructions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                For each route you prefer to run, in the Origin box, select one or more of 50 states, or select one of
                the 12 regions you start in, or you can select a city or zip code you start in. In the destination box,
                select your destination region or states, or a specify a city, then click Add Route. This isn’t to list
                all routes you could run, just the routes you most often accept loads or prefer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
