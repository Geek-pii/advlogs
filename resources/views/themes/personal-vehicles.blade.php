@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('styles')
    <style>
      .error {
        color: red!important;
      }
      #get-free-quote {
        -webkit-transform: translateY(-5rem);
        transform: translateY(-5rem);
        display: block;
      }
    </style>
@endsection

@section('content')
	@if(isset($blocks['PERSONAL-VEHICLES-SLIDER']) && isset($blocks['PERSONAL-VEHICLES-SLIDER'][0]))
		<div class="inner-page-slider">
			<div class="carousel-wrap">
				@if(isset($blocks['PERSONAL-VEHICLES-SLIDER'][0]->children))
					<div class="owl-carousel">
						@foreach($blocks['PERSONAL-VEHICLES-SLIDER'][0]->children as $key => $block)
							<div class="item">
								<div class="inner-page-slider-text-wrapper"
								     style="background:url('{{ asset($block->photo) }}') no-repeat top;">
									<div class="container">
										<h2>{{ $block->name }}</h2>
										{!! contentRender($block->content) !!}
										<div class="slider-buttons">
											<a href="{{ $block->url }}" class="get-stated-button">{!! $block->description !!}</a>
											<a href="#" class="learn-more-slider-button">
												<img src="{{ asset('assets/images/button-icon4.png') }}"
												     alt="icon"> Learn More </a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-HISTORY']) && isset($blocks['PERSONAL-VEHICLES-HISTORY'][0]))
		<div class="inner-about-history-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-6 mobile-display">
						<div class="about-image-wrp business-image-wrp" style="height:auto">
							<img src="{{ asset($blocks['PERSONAL-VEHICLES-HISTORY'][0]->photo) }}"
							     alt="{{ $blocks['PERSONAL-VEHICLES-HISTORY'][0]->name }}"></div>
					</div>
					<!--image about text-->
					<div class="col-md-6">
						<div class="about-text-inner-history business-text-inner-history personal-text-inner-history">
							<h2>{{ $blocks['PERSONAL-VEHICLES-HISTORY'][0]->name }}</h2>
							<p>{!! $blocks['PERSONAL-VEHICLES-HISTORY'][0]->content !!}</p>
						</div>
					</div>
					<!--image about text-->
					<!--image inner about-->
					<div class="col-md-6 no-mobile-display ">
						<div class="about-image-wrp business-image-wrp" style="height:auto">
							<img src="{{ asset($blocks['PERSONAL-VEHICLES-HISTORY'][0]->photo) }}"
							     alt="{{ $blocks['PERSONAL-VEHICLES-HISTORY'][0]->name }}"></div>
					</div>
					<!--image inner about-->
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-MORE-INFORMATION']) && isset($blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]))
		<div class="top-slider-section-tabs-wrp">
			<div class="container">
				<h2>{{ $blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]->name }}</h2>
				<div class="row">
					<div role="tabpanel">
						<div class="col-sm-3">
							@if(isset($blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]->children))
								<ul class="nav nav-pills brand-pills nav-stacked" role="tablist">
									@foreach($blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]->children as $key => $block)
										<li role="presentation" class="brand-nav @if($loop->first) active @endif">
											<a href="#tab{{ $key + 1 }}" aria-controls="tab{{ $key + 1 }}" role="tab" data-toggle="tab"
											   id="{{ str_slug($block->name) }}">{{ $block->name }}</a></li>
									@endforeach
								</ul>
							@endif
						</div>
						<div class="col-sm-9">
							@if(isset($blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]->children))
								<div class="tab-content">
									@foreach($blocks['PERSONAL-VEHICLES-MORE-INFORMATION'][0]->children as $key => $block)
										<div role="tabpanel" class="tab-pane @if($loop->first) active @endif" id="tab{{ $key + 1 }}">
											<div class="tabpanel-slider-top-section"
											     style="background:url('{{ asset($block->photo) }}') no-repeat top">
												<h3>{{ $block->name }}</h3>
												{!! contentRender($block->content) !!}
												<div class="slider-buttons">
													<a style="width:auto; padding:10px 40px" href="{{ $block->url }}"
													   class="get-stated-button">{!! $block->description !!}</a></div>
											</div>
										</div>
									@endforeach
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED']) && isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]))
		<div class="service-wrapper inner-service-wrapper presonal-vehicle-service-wrapper" style="background:none">
			<div class="container">
				<h1>{{ $blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]->name }}</h1>
				@if(isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]->children))
					<ul class="row">
						@foreach($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]->children as $key => $block)
							<li class="col-md-4 col-sm-6 col-xs-12">
								<div class="service-listing-wrp">
									<div class="service-listing-image"><img src="{{ asset($block->icon) }}" alt="service-icon"></div>
									<div class="service-listing-text">
										<h2>{{ $block->name }}</h2>
										<p>{!! $block->description !!}</p>
										<div class="read-more-button"><a href="#" data-toggle="modal"
										                                 data-target="#service-offered-{{ $key }}"> Read More </a></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	@endif

	<!--popup-->
	@if(isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED']) && isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]) && isset($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]->children))
		<div class="service-popup-wrapper">
			@foreach($blocks['PERSONAL-VEHICLES-SERVICES-OFFERED'][0]->children as $key => $block)
				<div id="service-offered-{{ $key }}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="service-listing-wrapper">
									<div class="row">
										<div class="col-md-3">
											<div class="service-image-wrapper"><img src="{{ asset($block->icon) }}" alt="icon"></div>
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
		</div>
	@endif
	<!--//popup-->

	@if(isset($blocks['PERSONAL-VEHICLES-WHY-USE']) && isset($blocks['PERSONAL-VEHICLES-WHY-USE'][0]))
		<div class="service-wrapper personal-service-wrapper" style="background:#f5f5f5;">
			<div class="container">
				<h1>{{ $blocks['PERSONAL-VEHICLES-WHY-USE'][0]->name }}</h1>
				<p>{!! $blocks['PERSONAL-VEHICLES-WHY-USE'][0]->description !!}</p>
				@if(isset($blocks['PERSONAL-VEHICLES-WHY-USE'][0]->children))
					<ul class="row">
						@foreach($blocks['PERSONAL-VEHICLES-WHY-USE'][0]->children as $key => $block)
							@if($loop->last)
								<li class="col-md-4 col-sm-3 col-xs-12"></li>
							@endif

							<li class="col-md-4 col-sm-6 col-xs-12">
								<div class="service-listing-wrp">
									<div class="service-listing-image">
										<img src="{{ asset($block->icon) }}" alt="service-icon"></div>
									<div class="service-listing-text">
										<h2>{{ $block->name }}</h2>
										<p>{!! $block->description !!}</p>
										<div class="read-more-button">
											<a href="#" data-toggle="modal" data-target="#why-use-{{ $key }}"> Read More </a>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	@endif

	<!--popup-->
	@if(isset($blocks['PERSONAL-VEHICLES-WHY-USE']) && isset($blocks['PERSONAL-VEHICLES-WHY-USE'][0]) && isset($blocks['PERSONAL-VEHICLES-WHY-USE'][0]->children))
		<div class="service-popup-wrapper">
			@foreach($blocks['PERSONAL-VEHICLES-WHY-USE'][0]->children as $key => $block)
				<div id="why-use-{{ $key }}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="service-listing-wrapper">
									<div class="row">
										<div class="col-md-3">
											<div class="service-image-wrapper"><img src="{{ asset($block->icon) }}" alt="icon"></div>
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
		</div>
	@endif
	<!--//popup-->

	@if(isset($blocks['PERSONAL-VEHICLES-HOW-OUR']) && isset($blocks['PERSONAL-VEHICLES-HOW-OUR'][0]))
		<div class="howitprocess-wrapper">
			<div class="container-fluid">
				<h2>{{ $blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->name }}</h2>
				<p>{!! $blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->description !!}</p>

				<!--desktop timeline-->
				<div class="time-desktop-wrapper">
					@if(isset($blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->children))
						<ul class="row">
							<li class="col-md-1 col-sm-2 col-xs-2"></li>
							@foreach($blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->children as $key => $block)
								<li class="col-md-2 col-sm-2 col-xs-2">
									<div class="listing-timeline-wrapper">
										<span> 0{{ $key + 1 }} </span>
										<div class="listing-timeline-list">
											<div class="listing-timeline-icon">
												<img src="{{ asset($block->icon) }}" alt="icon">
											</div>
											<h4>{{ $block->name }}</h4>
											<p>{!! $block->description !!}</p>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					@endif
				</div>
				<!--desktop timeline-->

				<!--mobile timeline-->
				<div class="mobile-timeline-wrapper">
					@if(isset($blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->children))
						<ul class="timeline">
							@foreach($blocks['PERSONAL-VEHICLES-HOW-OUR'][0]->children as $key => $block)
								<li>
									<div class="timeline-badge">0{{ $key + 1 }}</div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">{{ $block->name }}</h4>
										</div>
										<div class="timeline-body">
											<p>{!! $block->description !!}</p>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					@endif
				</div>
				<!--mobile timeline-->
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-SITE-CALLACTION']) && isset($blocks['PERSONAL-VEHICLES-SITE-CALLACTION'][0]))
		<div class="site-callaction-wrapper">
			<div class="container">
				@if(isset($blocks['PERSONAL-VEHICLES-SITE-CALLACTION'][0]->children))
					<ul>
						@foreach($blocks['PERSONAL-VEHICLES-SITE-CALLACTION'][0]->children as $key => $block)
							<li>
								<div class="lsiting-calltoaction-wrp">
									<div class="row">
										<div class="col-md-2">
											<div class="cal-action-image"><img src="{{ asset($block->icon) }}" alt=""></div>
										</div>
										<div class="col-md-10">
											<div class="call-text-listingwrapper">
												<h5>{{ $block->name }}</h5>
												<p>{!! $block->description !!}</p>
											</div>
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	@endif

	<!--get free quote-->
	@if(isset($blocks['PERSONAL-VEHICLES-GET-A-FREE']) && isset($blocks['PERSONAL-VEHICLES-GET-A-FREE'][0]))
		<span id="get-free-quote"></span>
		<div class="get-free-quote" id="free-quote">
			<div class="container">
				<h2>{{ $blocks['PERSONAL-VEHICLES-GET-A-FREE'][0]->name }}</h2>
				<p>{!! $blocks['PERSONAL-VEHICLES-GET-A-FREE'][0]->description !!}</p>
				<div class="form-new-quote-wrapper">
					<h2> Shipping Info </h2>
					<form class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label> Pick-up Zip Code </label>
								<input type="text" name="picking_zip" class="form-control" placeholder="Pick-up Zip Code">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Delivery Zip Code </label>
								<input type="text" name="delivery_zip" class="form-control" placeholder="Delivery Zip Code">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Preferred Pick up date </label>
								<input type="date" name="preferred_pick_up_date" class="form-control" placeholder="Preferred Pick up date">
							</div>
						</div>
						<div class="col-md-12">
							<h2> Vehicle Info </h2>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Year </label>
								<input type="text" name="year" class="form-control" placeholder="Year">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Make</label>
								<input type="text" name="make" class="form-control" placeholder="Make">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Model</label>
								<input type="text" name="model" class="form-control" placeholder="Model">
							</div>
						</div>
						<div class="col-md-12">
							<div class="button-get-quote pull-right">
                <a href="#" data-toggle="modal" data-target="#myModal1">
                  <img src="{{ asset('assets/images/button-icon6.png') }}" alt="icon-form"> Get a Free Quote
                </a>
              </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endif
	<!--get free quote-->

	<!--get quote popup-->
	@if(isset($blocks['PERSONAL-VEHICLES-GET-A-FREE']) && isset($blocks['PERSONAL-VEHICLES-GET-A-FREE'][0]))
		<div class="get-quote-popup-wrapper">
			<div id="myModal1" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">{{ $blocks['PERSONAL-VEHICLES-GET-A-FREE'][0]->name }}</h4>
						</div>
						<div class="modal-body">
							<div class="form-group-button-radio">
								<form class="row" id="quote-form" method="POST" action="{{ route('get.a.quote.post') }}">
                  @csrf
									<div class="col-md-3">
										<div class="form-group">
											<label for="happy">Condition</label>
											<div class="pricing-switcher">
												<p class="fieldset">
													<input type="radio" name="condition" value="Used" id="condition-yes" class="condition_radio"
													       checked/>
													<label for="condition-yes">Used</label>
													<input type="radio" name="condition" value="New" id="condition-no" class="condition_radio"/>
													<label for="condition-no">New</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group run-drive-div">
											<label for="happy">Runs & Drives</label>
											<div class="pricing-switcher">
												<p class="fieldset">
													<input type="radio" name="run_drives" value="Yes" id="run-drive-yes" class="run_drive_radio"
													       checked/>
													<label for="run-drive-yes">Yes</label>
													<input type="radio" name="run_drives" value="No" id="run-drive-no" class="run_drive_radio"/>
													<label for="run-drive-no">No</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group rolls-steer-brake-div hidden">
											<label for="happy">Rolls, Steers & Brakes?</label>
											<div class="pricing-switcher">
												<p class="fieldset">
													<input type="radio" name="rolls_steers_brakes" value="Yes" id="roll-steer-brake-yes"
													       class="roll_steer_radio" checked/>
													<label for="roll-steer-brake-yes">Yes</label>
													<input type="radio" name="rolls_steers_brakes" value="No" id="roll-steer-brake-no"
													       class="roll_steer_radio"/>
													<label for="roll-steer-brake-no">No</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<p class="rolls-steer-brake-no hidden">We’re sorry, but we do not arrange transport for these
												vehicles.</p>
											<p class="rolls-steer-brake-yes hidden">We will provide information on access requirements to
												transport inoperable vehicles with your quote.</p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-5">
										<div class="form-group form-group-margin">
											<label for="happy">Transport Type</label>
											<div class="pricing-switcher transport-type">
												<p class="fieldset">
													<input type="radio" name="transport_type" value="Open" id="transport-open" checked/>
													<label for="transport-open">Open</label>
													<input type="radio" name="transport_type" value="Enclosed" id="transport-enclosed"/>
													<label for="transport-enclosed">Enclosed</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-5">
										<div class="form-group form-group-margin">
											<label for="happy">Transport Speed</label>
											<div class="pricing-switcher transport-speed">
												<p class="fieldset">
													<input type="radio" name="transport_speed" value="Standard" id="transport-standard" checked/>
													<label for="transport-standard">Standard</label>
													<input type="radio" name="transport_speed" value="Expedited" id="transport-expedited"/>
													<label for="transport-expedited">Expedited</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12">
										<div class="form-group-margin">
											<label for="happy">Are there any modifications to the vehicle? </label>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="pricing-switcher">
												<p class="fieldset">
													<input type="radio" name="is_modifications" value="Yes" id="modifications-yes"
													       class="modification_radio"/>
													<label for="modifications-yes">Yes</label>
													<input type="radio" name="is_modifications" value="No" id="modifications-no"
													       class="modification_radio" checked/>
													<label for="modifications-no">No</label>
													<span class="switch"></span></p>
											</div>
											<div class="tooltip-wrapper"><a href="javascript:void(0)" class="second-tooltip" data-toggle="tooltip"
											                               data-placement="right" title="More Info Goes Here"><i
															class="fa fa-info-circle" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12">
										<div class="text-area-group modification-textarea hidden form-group-margin">
										<textarea class="form-control" rows="3" name="modification_description"
										          placeholder="Describe any modification to the vehicle that affect height, ground clearance, dimensions, or weight (100 lbs. or more).  Lifted or lowered, raised roof, ladders/racks/toolboxes, campers, roll bars, reinforcements, added external accessories, etc. "
										          id="modification-description"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="text-area-group form-group-margin">
											<label for="first_name">First Name</label>
											<input type="text" name="first_name" class="form-control" rows="3" placeholder="First Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="text-area-group form-group-margin">
											<label for="last_name">Last Name</label>
											<input type="text" name="last_name" class="form-control" rows="3" placeholder="Last Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="text-area-group form-group-margin">
											<label for="email_address">Email Address</label>
											<input type="email" name="email_address" class="form-control" rows="3" placeholder="Email Address" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="text-area-group form-group-margin">
											<label for="phone_number">Phone Number</label>
											<input type="text" name="phone_number" class="form-control" rows="3" placeholder="Phone Number" required>
										</div>
									</div>
									{{-- @if(config('app.env') == 'production')
                  <div class="col-md-12">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.captcha.site_key') }}"></div>
                  </div>
                  @endif --}}
								</form>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="buttonnextform" id="quote-submit">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!--//get quote popup-->

	<!-- Modal -->
	<div id="thankyouModal" class="modal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<p>Thank you for the opportunity to earn your business. One of our representatives will send your quote to
						(your email address) soon. Please add us to your list of contacts so your quote is not misdirected to a spam
						or junk folder.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
				</div>
			</div>
		</div>
	</div>

	@if(isset($blocks['PERSONAL-VEHICLES-FACTOR']) && isset($blocks['PERSONAL-VEHICLES-FACTOR'][0]))
		<div class="factor-wrapper">
			<div class="container">
				<h2>{{ $blocks['PERSONAL-VEHICLES-FACTOR'][0]->name }}</h2>
				@if(isset($blocks['PERSONAL-VEHICLES-FACTOR'][0]->children))
					<ul class="row">
						@foreach($blocks['PERSONAL-VEHICLES-FACTOR'][0]->children as $key => $block)
							<li class="col-md-6 col-sm-6 col-xs-12">
								<div class="listing-factor-wrapper">
									<div class="row">
										<div class="col-md-3">
											<div class="listing-factor-image"><img src="{{ asset($block->icon) }}" alt="icon"></div>
										</div>
										<div class="col-md-9">
											<div class="listing-factor-text">
												<h3>{{ $block->name }}</h3>
												<p>{!! $block->description !!}</p>
											</div>
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-SHIPPING']) && isset($blocks['PERSONAL-VEHICLES-SHIPPING'][0]))
		<div class="car-shipping-wrapper">
			<div class="container">
				<h2>{{ $blocks['PERSONAL-VEHICLES-SHIPPING'][0]->name }}</h2>
				@if(isset($blocks['PERSONAL-VEHICLES-SHIPPING'][0]->children))
					<div class="row">
						@foreach($blocks['PERSONAL-VEHICLES-SHIPPING'][0]->children as $key => $block)
							<div class="col-md-6">
								<div class="shipping-listing-text-wrp">
									<h3>{{ $block->name }}</h3>
									{!! contentRender($block->content) !!}
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	@endif

	@if(isset($blocks['PERSONAL-VEHICLES-SHIPPING-TIPS']) && isset($blocks['PERSONAL-VEHICLES-SHIPPING-TIPS'][0]))
		<div class="faqs-wrapper inner-tranport-wrapper">
			<div class="container">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<h2>{{ $blocks['PERSONAL-VEHICLES-SHIPPING-TIPS'][0]->name }}</h2>
					@if(isset($blocks['PERSONAL-VEHICLES-SHIPPING-TIPS'][0]->children))
						@foreach($blocks['PERSONAL-VEHICLES-SHIPPING-TIPS'][0]->children as $key => $block)
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading-{{ $key }}">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $key }}"
										   aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapse-{{ $key }}"> <i
													class="more-less glyphicon glyphicon-plus"></i>{{ $block->name }}</a></h4>
								</div>
								<div id="collapse-{{ $key }}" class="panel-collapse collapse" role="tabpanel"
								     aria-labelledby="heading-{{ $key }}">
									<div class="panel-body">{!! contentRender($block->content) !!}</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
				<!-- panel-group -->
			</div>
		</div>
	@endif
@endsection

@section('scripts')
	<script>
      let owl = $('.owl-carousel');
      owl.owlCarousel({
          loop: true,
          margin: 0,
          nav: true,
          navText: [
              "<i class='fa fa-angle-left'></i>",
              "<i class='fa fa-angle-right'></i>"
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
      owl.on('changed.owl.carousel', function (event) {
          console.log(event.page.index);
          let div_no = 0;
          $('.basic-service-listing-wrp').each(function () {
              if (event.page.index === div_no) {
                  $(this).addClass('basic-service-listing-wrp-active');
              } else {
                  $(this).removeClass('basic-service-listing-wrp-active');
              }
              div_no++;
          });
      });
	</script>
	<script>
      $(document).on('click', '.condition_radio', function () {
          let condition_val = $('.condition_radio:checked').val();
          if (condition_val === 'Used') {
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
      $(document).on('click', '.run_drive_radio', function () {
          let run_drive_val = $('.run_drive_radio:checked').val();
          if (run_drive_val === 'No') {
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
      $(document).on('click', '.roll_steer_radio', function () {
          let roll_steer_val = $('.roll_steer_radio:checked').val();
          if (roll_steer_val === 'No') {
              $('.rolls-steer-brake-no').removeClass('hidden');
              $('.rolls-steer-brake-yes').addClass('hidden');
          } else {
              $('.rolls-steer-brake-no').addClass('hidden');
              $('.rolls-steer-brake-yes').removeClass('hidden');
          }
      });
      $(document).on('click', '.modification_radio', function () {
          let modification_val = $('.modification_radio:checked').val();
          if (modification_val === 'Yes') {
              $('.modification-textarea').removeClass('hidden');
          } else {
              $('.modification-textarea').addClass('hidden');
              $('#modification-description').val('');
          }
      });
	</script>
  <script>
    $(document).ready(function() {
      $('#quote-form').validate({
		onfocusout: function(element) {$(element).valid()},
	  });

      $('#quote-submit').click(function(e) {
        e.preventDefault();
        
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
              modification_description: $('textarea[name=modification_description]').val(),
              first_name: $('input[name=first_name]').val(),
              last_name: $('input[name=last_name]').val(),
              email_address: $('input[name=email_address]').val(),
              phone_number: $('input[name=phone_number]').val()
            }
          })
          .done(function( msg ) {
            $('#myModal1').modal('hide');
            $('#thankyouModal').modal('show');
          })
          .fail(function( err) {
            alert(err);
          });
        } else {
          return false;
        }
      });
    });
  </script>
@endsection
