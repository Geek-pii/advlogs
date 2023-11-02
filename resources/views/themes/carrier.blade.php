@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
	@if(isset($blocks['CARRIER-BANNER']) && isset($blocks['CARRIER-BANNER'][0]))
		<div class="inner-page-slider">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<div class="inner-page-slider-text-wrapper"
						     style="background:url('{{ asset($blocks['CARRIER-BANNER'][0]->photo) }}') no-repeat top;">
							<div class="container">
								<h2>{{ $blocks['CARRIER-BANNER'][0]->name }}</h2>
								{!! contentRender($blocks['CARRIER-BANNER'][0]->content) !!}
								<div class="slider-buttons">
									<a href="{{ $blocks['CARRIER-BANNER'][0]->url }}"
									   class="get-stated-button">{!! $blocks['CARRIER-BANNER'][0]->description !!}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['CARRIER-HISTORY']) && isset($blocks['CARRIER-HISTORY'][0]))
		<div class="inner-about-history-wrapper career-detail-text-wrapper">
			<div class="container">
				<div class="row">
					<!--image about text-->
					<div class="col-md-6">
						<div class="about-text-inner-history business-text-inner-history">
							<h2>{{ $blocks['CARRIER-HISTORY'][0]->name }}</h2>
							<p>{!! $blocks['CARRIER-HISTORY'][0]->content !!}</p>
							<div class="slider-buttons inner-about-buttons">
								<a href="{{ $blocks['CARRIER-HISTORY'][0]->url }}"
								   class="get-stated-button">{!! $blocks['CARRIER-HISTORY'][0]->description !!}</a>
							</div>
						</div>
					</div>
					<!--image about text-->
					<!--image inner about-->
					<div class="col-md-6">
						<div class="about-image-wrp business-image-wrp">
							<img src="{{ asset($blocks['CARRIER-HISTORY'][0]->photo) }}"
							     alt="image"></div>
					</div>
					<!--image inner about-->
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['CARRIER-PARTNER']) && isset($blocks['CARRIER-PARTNER'][0]))
		<div class="service-wrapper inner-carrer-wrapper" style="background:#ebebeb;">
			<div class="container">
				<h1>{{ $blocks['CARRIER-PARTNER'][0]->name }}</h1>
				<p>{!! $blocks['CARRIER-PARTNER'][0]->content !!}</p>
				@if(isset($blocks['CARRIER-PARTNER'][0]->children))
					<ul class="row listing-carrire-wrapper inner-listing-carrire-wrapper">
						@foreach($blocks['CARRIER-PARTNER'][0]->children as $key => $block)
							@if($loop->last)
								<li class="col-md-3 col-sm-3 col-xs-12"></li>
							@endif
							<li class="col-md-6 col-sm-6 col-xs-12">
								<div class="service-listing-wrp">
									<div class="service-listing-image">
										<img src="{{ asset($block->icon) }}" alt="service-icon">
									</div>
									<div class="service-listing-text">
										<h2>{{ $block->name }}</h2>
										<p>{!! $block->description !!}</p>
										<div class="read-more-button">
											<a href="#" data-toggle="modal" data-target="#partner-{{ $key }}">
												Read More </a>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
				<div class="slider-buttons service-about-buttons">
					<a href="{{ $blocks['CARRIER-PARTNER'][0]->url }}"
					   class="get-stated-button">{!! $blocks['CARRIER-PARTNER'][0]->description !!}</a>
				</div>
			</div>
		</div>
	@endif

	<!--popup-->
	@if(isset($blocks['CARRIER-PARTNER']) && isset($blocks['CARRIER-PARTNER'][0]) && isset($blocks['CARRIER-PARTNER'][0]->children))
		<div class="service-popup-wrapper">
			@foreach($blocks['CARRIER-PARTNER'][0]->children as $key => $block)
				<div id="partner-{{ $key }}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="service-listing-wrapper">
									<div class="row">
										<div class="col-md-3">
											<div class="service-image-wrapper">
												<img src="{{ asset($block->icon) }}" alt="icon">
											</div>
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
@endsection
