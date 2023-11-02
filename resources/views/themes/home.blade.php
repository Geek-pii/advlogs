@extends('master')

@push('slider')
    @if (isset($blocks['HOME-SLIDER']) && isset($blocks['HOME-SLIDER'][0]))
        <div class="slider-wrapper">
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @if (isset($blocks['HOME-SLIDER'][0]->children))
                        @foreach ($blocks['HOME-SLIDER'][0]->children as $key => $block)
                            <div class="item {{ $key == 0 ? 'active' : '' }}">
                                <div class="slider-main-wrapper main-{{ $key }}" style="background-size: cover;">
                                    {{-- @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p style="color:black">{{ Session::get('success') }}</p>
                                </div>
                                @endif --}}
                                    <div class="slider-main-image">
                                        <div class="container">
                                            <div class="slider-text-wrapper" data-aos="slide-up">
                                                @if ($block->name == 'Business Clients')
                                                    <a href="{{ url('business-client') }}" style="text-decoration: none">
                                                        <h2>{{ $block->name }}</h2>
                                                    </a>
                                                @endif
                                                @if ($block->name == 'Carriers')
                                                    <a href="{{ url('carrier') }}" style="text-decoration: none">
                                                        <h2>{{ $block->name }}</h2>
                                                    </a>
                                                @endif
                                                @if ($block->name == 'Personal Vehicles')
                                                    <a href="{{ url('personal-vehicles') }}" style="text-decoration: none">
                                                        <h2>{{ $block->name }}</h2>
                                                    </a>
                                                @endif
                                                {{-- @dd($block->name) --}}
                                                <p>Putting Clients First Through Service, Value And Communication</p>
                                                <!-- {!! contentRender($block->content) !!} -->
                                                <div class="slider-buttons">
                                                    {{-- @if ($block->name == 'Business Clients')
														<a href="{{url('sign-up/'.'Business Client account')}}" class="get-stated-button">{!! $block->description !!}</span>
                                    </a>
                                    @endif --}}
                                                    @if ($block->name == 'Business Clients')
                                                        <a href="{{ url('sign-up?type=business') }}"
                                                            name="" class="get-stated-button">
                                                            {!! $block->description !!}

                                                            {{-- @dd($block->url) --}}
                                                        </a>
                                                    @endif
                                                    @if ($block->name == 'Carriers')
                                                        <a href="{{ url('sign-up?type=carrier') }}"
                                                            class="get-stated-button">
                                                            {!! $block->description !!}
                                                            {{-- @dd($block->description) --}}
                                                        </a>
                                                    @endif
                                                    @if ($block->name == 'Personal Vehicles')
                                                        <a href="{{ url('sign-up?type=personal') }}"
                                                            class="get-stated-button">
                                                            {!! $block->description !!}
                                                            {{-- @dd($block->description) --}}
                                                        </a>
                                                    @endif
                                                    {{-- <a href="{{ $block->url }}" class="learn-more-slider-button">
                                    <img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More
                                    </a> --}}
                                                    @if ($block->name == 'Business Clients')
                                                        <a href="{{ url('business-client') }}"
                                                            class="learn-more-slider-button">
                                                            <picture>
                                                                <source id="s1"
                                                                    srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                    type="image/webp">
                                                                <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                    alt="icon"> Learn More
                                                            </picture>
                                                        </a>
                                                    @endif
                                                    @if ($block->name == 'Carriers')
                                                        <a href="{{ url('carrier') }}" class="learn-more-slider-button">
                                                            <picture>
                                                                <source id="s1"
                                                                    srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                    type="image/webp">
                                                                <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                    alt="icon"> Learn More
                                                            </picture>
                                                        </a>
                                                    @endif
                                                    @if ($block->name == 'Personal Vehicles')
                                                        <a href="{{ url('personal-vehicles') }}"
                                                            class="learn-more-slider-button">
                                                            <picture>
                                                                <source id="s1"
                                                                    srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                    type="image/webp">
                                                                <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                    alt="icon"> Learn More
                                                            </picture>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endif
@endpush

@section('styles')
    <style>        .error {
            color: red !important;
        }

        #modifications {
            display: none;
        }

        .my-error-class {
            color: red !important;
        }

        /* .contact-main-wrapper {
                            background-image: url('{{ asset($blocks['HOME-CONTACT'][0]->photo) }}'), url('{{ asset($blocks['HOME-CONTACT'][0]->photo1) }}');
                        } */

        .contact-main-wrapper {
            background-image: url('{{ asset($blocks['HOME-CONTACT'][0]->photo) }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset($blocks['HOME-CONTACT'][0]->photo1) }}') 1x)) {
            .contact-main-wrapper {
                background-image: -webkit-image-set(url('{{ asset($blocks['HOME-CONTACT'][0]->photo1) }}') 1x)
            }
        }

        .main-0 {
            background-image: url('{{ asset('assets/images/slider-image1.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/slider-image1.webp') }}') 1x)) {
            .main-0 {
                background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/slider-image1.webp') }}') 1x)
            }
        }

        .main-1 {
            background-image: url('{{ asset('assets/images/slider-image2.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/slider-image2.webp') }}') 1x)) {
            .main-1 {
                background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/slider-image2.webp') }}') 1x)
            }
        }

        .main-2 {
            background-image: url('{{ asset('assets/images/slider-image3.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/slider-image3.webp') }}') 1x)) {
            .main-2 {
                background-image: -webkit-image-set(url('{{ asset('/assets/images/fallback/slider-image3.webp') }}') 1x)
            }
        }

        .service-image-0 {
            background-image: url('{{ asset('assets/images/listing-service-image2.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/listing-service-image2.webp') }}') 1x)) {
            .service-image-0 {
                background-image: -webkit-image-set(url('{{ asset('/assets/images/fallback/listing-service-image2.webp') }}') 1x)
            }
        }

        .service-image-1 {
            background-image: url('{{ asset('assets/images/listing-service-image3.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/listing-service-image3.webp') }}') 1x)) {
            .service-image-1 {
                background-image: -webkit-image-set(url('{{ asset('/assets/images/fallback/listing-service-image3.webp') }}') 1x)
            }
        }

        .service-image-2 {
            background-image: url('{{ asset('assets/images/listing-service-image4.jpeg') }}');
        }

        @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/listing-service-image4.webp') }}') 1x)) {
            .service-image-2 {
                background-image: -webkit-image-set(url('{{ asset('/assets/images/fallback/listing-service-image4.webp') }}') 1x)
            }
        }

        .slider-text-wrapper p {
            color: white;
        }



        @media(max-width:768px) {
            .contact-main-wrapper {
                background: none;
            }
        }


        @media(max-width:978px) {
            .modal-footer {
                margin-bottom: 36px !important;
            }
        }
    </style>
@endsection

@section('content')
    <!--basic services boxes-->
    @if (isset($blocks['HOME-SLIDER']) && isset($blocks['HOME-SLIDER'][0]))
        <div class="basic-service-boxes-wrapper">
            <div class="container">
                <ul class="row">
                    @if (isset($blocks['HOME-SLIDER'][0]->children))
                        @foreach ($blocks['HOME-SLIDER'][0]->children as $key => $block)
                            <li class="col-md-4 col-sm-4 col-xs-12">
                                <div
                                    class="basic-service-listing-wrp {{ $key == 0 ? 'basic-service-listing-wrp-active' : '' }}">

                                    @if ($block->name == 'Business Clients')
                                        <span>
                                            <a href="{{ url('business-client') }}" class="learn-more-slider-button">
                                                <img src="{{ asset($block->icon) }}" alt="icon">
                                            </a>
                                            <br>
                                        </span>
                                        <strong>
                                            <a href="{{ url('business-client') }}"
                                                class="learn-more-slider-button">{{ $block->name }}</a>
                                        </strong>
                                        <a href="{{ url('sign-up?type=business') }}" class="clickable-btn">
                                            {!! $block->description !!}
                                            <input type="hidden" name="val" value="Business Client account">
                                            {{-- @dd($block->url) --}}
                                        </a>
                                        <a href="{{ url('business-client') }}" class="view-more-button"> Learn More </a>
                                    @endif
                                    @if ($block->name == 'Carriers')
                                        <span>
                                            <a href="{{ url('carrier') }}" class="learn-more-slider-button">
                                                <img src="{{ asset($block->icon) }}" alt="icon">
                                            </a>
                                            <br>
                                        </span>
                                        <strong>
                                            <a href="{{ url('carrier') }}"
                                                class="learn-more-slider-button">{{ $block->name }}</a>
                                        </strong>
                                        <a href="{{ url('sign-up?type=carrier') }}" class="clickable-btn">
                                            {!! $block->description !!}
                                            {{-- @dd($block->description) --}}
                                        </a>
                                        <a href="{{ url('carrier') }}" class="view-more-button"> Learn More </a>
                                    @endif
                                    @if ($block->name == 'Personal Vehicles')
                                        <span>
                                            <a href="{{ url('personal-vehicles') }}" class="learn-more-slider-button">
                                                <img src="{{ asset($block->icon) }}" alt="icon">
                                            </a>
                                            <br>
                                        </span>
                                        <strong>
                                            <a href="{{ url('personal-vehicles') }}"
                                                class="learn-more-slider-button">{{ $block->name }}</a>
                                        </strong>
                                        <a href="{{ url('sign-up?type=personal') }}" class="clickable-btn">
                                            {!! $block->description !!}
                                            {{-- @dd($block->description) --}}
                                        </a>
                                        <a href="{{ url('personal-vehicles') }}" class="view-more-button"> Learn More </a>
                                    @endif
                                    {{-- <a href="{{url('sign-up')}}" class="clickable-btn">
                    {!! $block->description !!}

                    </a> --}}
                                    {{-- <a href="{{ $block->url }}" class="view-more-button"> Learn More </a> --}}
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    @endif
    <!--//basic services boxes-->

    <!--our service-->
    @if (isset($blocks['HOME-WHY-USE']) && isset($blocks['HOME-WHY-USE'][0]))
        <div class="service-wrapper home-service-wrapper">
            <div class="container">
                <h1>{{ $blocks['HOME-WHY-USE'][0]->name }}</h1>
                <p>{!! $blocks['HOME-WHY-USE'][0]->description !!}</p>
                <ul class="row justify-content-center">
                    @if (isset($blocks['HOME-WHY-USE'][0]->children))
                        @foreach ($blocks['HOME-WHY-USE'][0]->children as $key => $block)
                            <li class="col-md-4 col-sm-6 col-xs-12">
                                <div class="service-listing-wrp">
                                    <div class="service-listing-image">
                                        <img src="{{ asset($block->icon) }}" alt="service-icon">
                                    </div>
                                    <div class="service-listing-text">
                                        <h2>{{ $block->name }}</h2>
                                        <p>{!! $block->description !!}</p>
                                        <div class="button-service-readmore">
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#myModalService-{{ $key }}">Read
                                                More</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    @endif
    <!--our service-->

    <!--popup-->
    <div class="service-popup-wrapper">
        @if (isset($blocks['HOME-WHY-USE']) && isset($blocks['HOME-WHY-USE'][0]))
            @if (isset($blocks['HOME-WHY-USE'][0]->children))
                @foreach ($blocks['HOME-WHY-USE'][0]->children as $key => $block)
                    <div id="myModalService-{{ $key }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="service-listing-wrapper">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="service-image-wrapper"><img src="{{ asset($block->icon) }}"
                                                        alt="icon"></div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="service-text-wrapper">
                                                    <h2>{{ $block->name }}</h2>
                                                    {!! contentRender($block->content) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
    <!--//popup-->

    <!--call to action-->
    @if (isset($blocks['HOME-COMMUNICATION']) && isset($blocks['HOME-COMMUNICATION'][0]))
        <div class="call-to-action-wrapper">
            <div class="container">
                <ul>
                    <li><img src="{{ asset($blocks['HOME-COMMUNICATION'][0]->icon) }}" alt="icon"></li>
                    <li><span>{!! $blocks['HOME-COMMUNICATION'][0]->name !!}</span></li>
                    <li class="pull-right">
                        <a href="{{ url('sign-up?type=none') }}">
                            <picture>
                                <source id="s1" srcset="{{ asset('assets/images/fallback/button-icon3.webp') }}"
                                    type="image/webp">
                                <img src="{{ asset('assets/images/button-icon3.png') }}" alt="icon"> Get Started
                            </picture>
                            {{-- <img src="{{ asset('assets/images/button-icon3.png') }}" alt="icon"> Get Started --}}
                        </a>
                        {{-- <a href="{{ $blocks['HOME-COMMUNICATION'][0]->url }}">
                <img src="{{ asset('assets/images/button-icon3.png') }}" alt="icon"> Get Started
                </a> --}}
                    </li>
                </ul>
            </div>
        </div>
    @endif
    <!--call to action-->

    <!--get free quote-->
    @if (isset($blocks['HOME-GET-A-FREE']) && isset($blocks['HOME-GET-A-FREE'][0]))
        <div class="get-free-quote">
            <div class="container">
                <h2>{{ $blocks['HOME-GET-A-FREE'][0]->name }}</h2>
                <p>{!! $blocks['HOME-GET-A-FREE'][0]->description !!}</p>
                <div class="form-new-quote-wrapper">
                    <h2> Shipping Info </h2>
                    <form class="row" id="shipping">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Pick-up Zip Code </label>
                                <input type="text" name="picking_zip" id="picking_zip" class="form-control zip_code"
                                    placeholder="Pick-up Zip Code" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Delivery Zip Code </label>
                                <input type="text" name="delivery_zip" id="delivery_code"
                                    class="form-control zip_code" placeholder="Delivery Zip Code" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Preferred Pick up date </label>
                                <input type="date" name="preferred_pick_up_date" id="preferred_pick_up_date"
                                    class="form-control" placeholder="Preferred Pick up date" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h2> Vehicle Info </h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Year </label>
                                <input type="text" name="year" id="year2" class="form-control year"
                                    placeholder="Year" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Make</label>
                                <input type="text" name="make" id="make2" class="form-control"
                                    placeholder="Make" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Model</label>
                                <input type="text" name="model" id="model2" class="form-control"
                                    placeholder="Model" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="button-get-quote pull-right">
                                <a href="#" id="get-free" onclick="form()">
                                    <picture>
                                        <source id="s1"
                                            srcset="{{ asset('assets/images/fallback/button-icon6.webp') }}"
                                            type="image/webp">
                                        <img src="{{ asset('assets/images/button-icon6.png') }}" alt="icon-form"> Get a
                                        Free Quote
                                    </picture>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <!--get free quote-->

    <div class="get-quote-button"><a href="#"> Get a Free Quote </a></div>

    <!--get quote popup-->
    <div class="get-quote-popup-wrapper">
        <div id="myModal1" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Get a Free Personal Vehicle Quote </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-button-radio">
                            <form class="row" id="quote-form" method="POST"
                                action="{{ route('get.a.quote.post') }}">
                                @csrf
                                <div class="quote-checkboxes">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="happy">Condition</label>
                                            <div class="pricing-switcher">
                                                <p class="fieldset">
                                                    <input type="radio" name="condition" value="Used"
                                                        id="condition-yes" class="condition_radio" checked />
                                                    <label for="condition-yes">Used</label>
                                                    <input type="radio" name="condition" value="New"
                                                        id="condition-no" class="condition_radio" />
                                                    <label for="condition-no">New</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                    class="second-tooltip" data-toggle="tooltip" data-placement="right"
                                                    title="{{ $info->name }}"><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group run-drive-div">
                                            <label for="happy">Runs & Drives</label>
                                            <div class="pricing-switcher">
                                                <p class="fieldset">
                                                    <input type="radio" name="run_drives" value="Yes"
                                                        id="run-drive-yes" class="run_drive_radio" checked />
                                                    <label for="run-drive-yes">Yes</label>
                                                    <input type="radio" name="run_drives" value="No"
                                                        id="run-drive-no" class="run_drive_radio" />
                                                    <label for="run-drive-no">No</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                    class="second-tooltip" data-toggle="tooltip" data-placement="right"
                                                    title="{{ $info->run }}"><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group rolls-steer-brake-div hidden">
                                            <label for="happy">Rolls, Steers & Brakes?</label>
                                            <div class="pricing-switcher">
                                                <p class="fieldset">
                                                    <input type="radio" name="rolls_steers_brakes" value="Yes"
                                                        id="roll-steer-brake-yes" class="roll_steer_radio" checked />
                                                    <label for="roll-steer-brake-yes">Yes</label>
                                                    <input type="radio" name="rolls_steers_brakes" value="No"
                                                        id="roll-steer-brake-no" class="roll_steer_radio" />
                                                    <label for="roll-steer-brake-no">No</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                    class="second-tooltip" data-toggle="tooltip" data-placement="right"
                                                    title="{{ $info->rolls }}"><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="rolls-steer-brake-no hidden">We’re sorry, but we do not arrange
                                                transport
                                                for these
                                                vehicles.</p>
                                            <p class="rolls-steer-brake-yes hidden">We will provide information on
                                                access
                                                requirements to
                                                transport inoperable vehicles with your quote.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group form-group-margin">
                                            <label for="happy">Transport Type</label>
                                            <div class="pricing-switcher transport-type">
                                                <p class="fieldset">
                                                    <input type="radio" name="transport_type" value="Open"
                                                        id="transport-open" checked />
                                                    <label for="transport-open">Open</label>
                                                    <input type="radio" name="transport_type" value="Enclosed"
                                                        id="transport-enclosed" />
                                                    <label for="transport-enclosed">Enclosed</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                    class="second-tooltip" data-toggle="tooltip" data-placement="right"
                                                    title="{{ $info->type }}"><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group form-group-margin">
                                            <label for="happy">Transport Speed</label>
                                            <div class="pricing-switcher transport-speed">
                                                <p class="fieldset">
                                                    <input type="radio" name="transport_speed" value="Standard"
                                                        id="transport-standard" checked />
                                                    <label for="transport-standard">Standard</label>
                                                    <input type="radio" name="transport_speed" value="Expedited"
                                                        id="transport-expedited" />
                                                    <label for="transport-expedited">Expedited</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                    class="second-tooltip" data-toggle="tooltip" data-placement="right"
                                                    title="{{ $info->speed }}"><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group-margin">
                                            <label for="happy">Are there any modifications to the vehicle? </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="pricing-switcher">
                                                <p class="fieldset">
                                                    <input type="radio" name="is_modifications" value="1"
                                                        id="modifications-yes" class="modification_radio" />
                                                    <label for="modifications-yes">Yes</label>
                                                    <input type="radio" name="is_modifications" value="0"
                                                        id="modifications-no" class="modification_radio" checked />
                                                    <label for="modifications-no">No</label>
                                                    <span class="switch"></span>
                                                </p>
                                            </div>
                                            <div class="tooltip-wrapper">
                                                <a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
                                                    data-placement="right" title="{{ $info->modification }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="modifications">
                                    <div class="col-md-12">
                                        <div class="text-area-group  form-group-margin form-group">
                                            <textarea class="form-control" style="height: 80px" rows="4" name="modification_description"
                                                placeholder="Describe any modification to the vehicle that affect height, ground clearance, dimensions, or weight (100 lbs. or more).  Lifted or lowered, raised roof, ladders/racks/toolboxes, campers, roll bars, reinforcements, added external accessories, etc. "
                                                id="modification-description" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="text-area-group form-group-margin form-group">
                                        <label for="happy">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            rows="3" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-area-group form-group-margin form-group">
                                        <label for="happy">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            rows="3" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-area-group form-group-margin form-group">
                                        <label for="happy">Email Address</label>
                                        <input type="email" name="email_address" id="email_address"
                                            class="form-control" rows="3" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-area-group form-group-margin form-group">
                                        <label for="happy">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            rows="3" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.captcha.site_key') }}">
                                    </div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha"
                                        id="hiddenRecaptcha">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="buttonnextform" id="quote-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//get quote popup-->
    <!-- Modal -->
    <div id="thankyouModal" class="modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p class="thankyouModal-msg">Thank you for the opportunity to serve you. Jeremiah will send your quote
                        to <span class="thankyouModal-msg-email"></span> soon.
                        Please add jessary@advlogs.com to your email contacts so your quote is not misdirected to a spam or
                        junk
                        folder.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!--listing main services-->
    @if (isset($blocks['HOME-GRID']) && isset($blocks['HOME-GRID'][0]))
        <div class="listing-main-service-wrapper">
            <div class="container-fluid">
                <ul class="row">
                    @if (isset($blocks['HOME-GRID'][0]->children))
                        @foreach ($blocks['HOME-GRID'][0]->children as $key => $block)
                            <li class="col-md-4 col-sm-12 col-xs-12">
                                <div class="listing-service-wrapper">
                                    <div class="listing-service-image service-image-{{ $key }}">
                                        <div class="listing-service-text">
                                            <div class="listing-service-text-image"><img src="{{ asset($block->icon) }}"
                                                    alt="icon">
                                            </div>
                                            <h2>{{ $block->name }}</h2>
                                            {!! contentRender($block->content) !!}
                                            <div class="slider-buttons">
                                                {{-- <a href="{{url('sign-up')}}" class="get-stated-button">{!! $block->description !!}</a>
                                <a href="{{ $block->url }}" class="learn-more-slider-button">
                                    <img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More
                                </a> --}}

                                                @if ($block->name == 'Business Clients')
                                                    <a href="{{ url('sign-up?type=business') }}"
                                                        class="get-stated-button">
                                                        {!! $block->description !!}
                                                        <input type="hidden" name="val"
                                                            value="Business Client account">
                                                        {{-- @dd($block->url) --}}
                                                    </a>
                                                    <a href="{{ url('business-client') }}"
                                                        class="learn-more-slider-button">
                                                        <picture>
                                                            <source id="s1"
                                                                srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                type="image/webp">
                                                            <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                alt="icon"> Learn More
                                                        </picture>
                                                        {{-- <img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More --}}
                                                    </a>
                                                @endif
                                                @if ($block->name == 'Carriers')
                                                    <a href="{{ url('sign-up?type=carrier') }}"
                                                        class="get-stated-button">
                                                        {!! $block->description !!}
                                                        {{-- @dd($block->description) --}}
                                                    </a>
                                                    <a href="{{ url('carrier') }}" class="learn-more-slider-button">
                                                        <picture>
                                                            <source id="s1"
                                                                srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                type="image/webp">
                                                            <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                alt="icon"> Learn More
                                                        </picture>
                                                        {{-- <img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More --}}
                                                    </a>
                                                @endif
                                                @if ($block->name == 'Personal Vehicles')
                                                    <a href="{{ url('sign-up?type=personal') }}"
                                                        class="get-stated-button">
                                                        {!! $block->description !!}
                                                        {{-- @dd($block->description) --}}
                                                    </a>
                                                    <a href="{{ url('personal-vehicles') }}"
                                                        class="learn-more-slider-button">
                                                        <picture>
                                                            <source id="s1"
                                                                srcset="{{ asset('assets/images/fallback/button-icon4.webp') }}"
                                                                type="image/webp">
                                                            <img src="{{ asset('assets/images/button-icon4.png') }}"
                                                                alt="icon"> Learn More
                                                        </picture>
                                                        {{-- <img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More --}}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    @endif
    <!--//listing main services-->

    <!--contact-->
    @if (isset($blocks['HOME-CONTACT']) && isset($blocks['HOME-CONTACT'][0]))
        <div class="contact-main-wrapper" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="contact-form-wrapper">
                            <h3>{{ $blocks['HOME-CONTACT'][0]->name }}</h3>
                            <form action="#" class="row" id="contact-form">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> First Name </label>
                                        <input type="text" name="first_name" id="logistic_first_name"
                                            class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Last Name </label>
                                        <input type="text" name="last_name" id="logistic_last_name"
                                            class="form-control" placeholder="Last Name ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email Address</label>
                                        <input type="email" name="email" id="logistic_email" class="form-control"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Phone Number</label>
                                        <input type="text" name="phone" id="logistic_phone" class="form-control"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Send Email To </label>
                                        <select class="form-control" id="logistic_department" name="department">
                                            <option>Select a Department</option>
                                            <option>Client Services</option>
                                            <option>Dispatch</option>
                                            <option>Accounting</option>
                                            <option>Signup Team</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-area-group form-group">
                                        <textarea class="form-control" id="logistic_message" name="message" rows="5" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-button-contact">
                                        <input type="button" value="Send Your Message" class="contact-button">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--//contact-->

    <style>
        .basic-service-listing-wrp-active {
            opacity: 0.9;
        }
    </style>
@endsection

@section('scripts')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        owl.on('changed.owl.carousel', function(event) {
            var div_no = 0;
            $('.basic-service-listing-wrp').each(function() {
                if (event.page.index == div_no) {
                    $(this).addClass('basic-service-listing-wrp-active');
                } else {
                    $(this).removeClass('basic-service-listing-wrp-active');
                }
                div_no++;
            });
        });
    </script>
    <script>
        $(document).on('click', '.clickable-btn', function() {
            location.assign($(this).attr('href'));
        });
    </script>
    <script>
        $('#radioBtn a').on('click', function() {
            var sel = $(this).data('title');
            var tog = $(this).data('toggle');
            $('#' + tog).prop('value', sel);

            $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass(
                'notActive');
            $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
        })
    </script>
    <script>
        $('#radioBtn1 a').on('click', function() {
            var sel = $(this).data('title');
            var tog = $(this).data('toggle');
            $('#' + tog).prop('value', sel);

            $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass(
                'notActive');
            $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
        })
    </script>

    {{-- <script>
      $(document).ready(function () {
          var stickyNavTop = $('.wrapper').offset().top;
          var stickyNav = function () {
              var scrollTop = $(window).scrollTop();
              if (scrollTop >= 10) {
                  $('.wrapper').addClass('sticky');
                  $('.slider_wrapper').addClass('margin-top');
              } else {
                  $('.wrapper').removeClass('sticky');
                  $('.slider_wrapper').removeClass('margin-top');
              }
          };
          stickyNav();
          $(window).scroll(function () {
              stickyNav();
          });
      });
	</script> --}}

    <!--painting load more-->
    <script>
        $('.load-more-items a').on('click', function() {
            $('.spinner').removeClass('hidden');
            setTimeout(function() {
                if ($('.load-1').is(":visible")) {
                    $('.load-2').show();
                }
                if ($('.load-1').is(":hidden")) {
                    $('.load-1').show();
                }
                $('.spinner').addClass('hidden');
            }, 1000);
        });
    </script>
    <!--painting load more-->

    <script>
        $("#scroll-to-next").click(function() {

            $('html, body').animate({
                scrollTop: $("#scroll-to").offset().top - 60
            }, 1000);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            // $('#tooltip-content').mouseover(function() {
            //     $.ajax({
            //         url : '/info',
            //         method : 'get',
            //         success : function(response) {
            //             $.each(response, function(index,response){
            //                 this.attr('title', response).tooltip().mouseover();
            //             })
            //         }
            //     })
            // })
        });
    </script>
    <script>
        $(document).on('click', '.condition_radio', function() {
            var condition_val = $('.condition_radio:checked').val();
            if (condition_val == 'Used') {
                $('.run-drive-div').removeClass('hidden');
                $('.rolls-steer-brake-div').addClass('hidden');
            } else {
                $('#run-drive-yes').click();
                $('#run-drive-yes').prop('checked', true);
                $('.run-drive-div').addClass('hidden');
                $('.rolls-steer-brake-div').addClass('hidden');
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            }
        });
        $(document).on('click', '.run_drive_radio', function() {
            var run_drive_val = $('.run_drive_radio:checked').val();
            if (run_drive_val == 'No') {
                $('#roll-steer-brake-yes').click();
                $('#roll-steer-brake-yes').prop('checked', true);
                $('.rolls-steer-brake-div').removeClass('hidden');
            } else {
                $('#roll-steer-brake-yes').click();
                $('#roll-steer-brake-yes').prop('checked', true);
                $('.rolls-steer-brake-div').addClass('hidden');
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            }
        });
        $(document).on('click', '.roll_steer_radio', function() {
            var roll_steer_val = $('.roll_steer_radio:checked').val();
            if (roll_steer_val == 'No') {
                $('.rolls-steer-brake-no').removeClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            } else {
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').removeClass('hidden');
            }
        });
        $(document).on('click', '.modification_radio', function() {
            var modification_val = $('.modification_radio:checked').val();
            if (modification_val == 'Yes') {
                $('.modification-textarea').removeClass('hidden');
            } else {
                $('.modification-textarea').addClass('hidden');
                $('#modification-description').val('');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // $('#quote-form').validate();
            $('#quote-submit').click(function(e) {

                if (grecaptcha.getResponse() == '') {
                    alert('Captcha Required')
                    return false;
                }

                e.preventDefault();
                //var email_address: $('input[name=email_address]').val()
                var b = $('#quote-form').validate({
                    onfocusout: function(element) {$(element).valid()},
                    errorClass: "my-error-class",
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        email_address: {
                            required: true,
                        },
                        phone_number: {
                            required: true,
                        },
                        modification_description: {
                            required: true,
                        }
                    },
                }).form();

                if ($('#quote-form').valid()) {
                    $.ajax({
                            method: "POST",
                            url: "{{ route('get.a.quote.post') }}",
                            data: {
                                picking_zip: $('input[name=picking_zip]').val(),
                                delivery_zip: $('input[name=delivery_zip]').val(),
                                preferred_pick_up_date: $('input[name=preferred_pick_up_date]').val(),
                                year: $('input[name=year]').val(),
                                make: $('input[name=make]').val(),
                                model: $('input[name=model]').val(),
                                condition: $('input[name=condition]:checked').val(),
                                run_drives: $('input[name=run_drives]:checked').val(),
                                rolls_steers_brakes: $('input[name=rolls_steers_brakes]:checked').val(),
                                transport_type: $('input[name=transport_type]:checked').val(),
                                transport_speed: $('input[name=transport_speed]:checked').val(),
                                is_modifications: $('input[name=is_modifications]:checked').val(),
                                modification_description: $('textarea[name=modification_description]')
                                    .val(),
                                first_name: $('input[name=first_name]').val(),
                                last_name: $('input[name=last_name]').val(),
                                email_address: $('input[name=email_address]').val(),
                                phone_number: $('input[name=phone_number]').val()
                            }
                        })
                        .done(function(msg) {
                            console.log(msg);
                            var m = msg.message
                            var mail = document.getElementById('email_address').value;
                            var mm = m.replace('YOUR_EMAIL', mail);
                            console.log(mm);

                            $('.thankyouModal-msg').empty();
                            $('.thankyouModal-msg').append(mm);
                            $('#myModal1').modal('hide');
                            $('#thankyouModal').modal('show');
                            //  console.log(a);
                            // window.location.reload();
                        })
                        .fail(function(err) {
                            alert(err);
                        });
                } else {
                    return false;
                }
            });
            $('#thankyouModal').on('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
    <script>
        function isUSAZipCode(str) {
            return /^\d{5}(-\d{4})?$/.test(str);
        }

        function validateInput() {
            let zipCode = document.getElementById("picking_zip").value;
            let message = "";
            if (isUSAZipCode(zipCode)) {
                message = "Valid Zip Code";
            } else {
                message = "Invalid Zip Code";
            }
            document.getElementById("msg").innerHTML = message;
        }

        // Get a Free Personal Vehicle Quote Validations
        function form() {
            event.preventDefault();
            var form_validation = $('#shipping').validate({
                onfocusout: function(element) {$(element).valid()},
                errorClass: "my-error-class",
                rules: {
                    picking_zip: {
                        required: true,
                        zip_code: /^\d{5}(-\d{4})?$/
                    },
                    delivery_zip: {
                        required: true,
                        zip_code: /^\d{5}(-\d{4})?$/
                    },
                    preferred_pick_up_date: {
                        required: true,
                    },
                    year: {
                        required: true,
                    },
                    make: {
                        required: true,
                    },
                    model: {
                        required: true,
                    },
                },
            }).form();
            if (form_validation) {
                $('#myModal1').modal('show');
            }
        }
        $(document).ready(function() {
            $('input[name="is_modifications"]').on('click', function() {
                var query = $(this).val();
                // alert(b);
                // alert(query);
                // $('.modifications').show('1000');
                if (query == 1) {
                    // var a = $('#modification-description').val();
                    // console.log(a);
                    var a = document.getElementById('modification-description');
                    a.setAttribute("required", "");
                    $('#modifications').show();
                    // $('#modification-description').val($('#modification-description').val() + a);
                } else {
                    // $('#modification-description').val($('#modification-description').val() + a);
                    $('#modification-description').removeAttr('required');
                    $('#modifications').hide();
                }
            });
            // Get free quote button for mobile screen
            $('.get-quote-button').click(function() {
                window.location.href = "/personal-vehicles/#free-quote";
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#quote-form').validate({
                onfocusout: function(element) {$(element).valid()},
            });

            $('.contact-button').click(function(e) {



                e.preventDefault();
                var b = $('#contact-form').validate({
                    onfocusout: function(element) {$(element).valid()},
                    errorClass: "my-error-class",
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        email: {
                            required: true,
                        },
                        phone: {
                            required: true,
                        },
                        department: {
                            required: true,
                        },
                        message: {
                            required: true,
                        }
                    },
                }).form();
                if ($('#contact-form').valid()) {
                    var email = $('#logistic_email').val();
                    var first_name = $('#logistic_first_name').val();
                    var last_name = $('#logistic_last_name').val();
                    var phone = $('#logistic_phone').val();
                    var message = $('#logistic_message').val();
                    var department = $('#logistic_department').val();
                    $.ajax({
                            method: "POST",
                            url: "{{ route('contact.post') }}",
                            data: {
                                department: department,
                                first_name: first_name,
                                last_name: last_name,
                                email: email,
                                phone: phone,
                                message: message
                            }
                        })
                        .done(function(msg) {
                            console.log(msg);
                            $('.thankyouModal-msg').empty();
                            $('.thankyouModal-msg').append(msg);
                            // $('#myModal1').modal('hide');
                            $('#thankyouModal').modal('show');
                            //  console.log(a);
                            // window.location.reload();
                        })
                        .fail(function(err) {
                            alert(err);
                        });
                } else {
                    return false;
                }
            });
            $('#thankyouModal').on('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
