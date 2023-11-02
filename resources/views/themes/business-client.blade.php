@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
	@if(isset($blocks['BUSINESS-CLIENT-SLIDER']) && isset($blocks['BUSINESS-CLIENT-SLIDER'][0]))
		<div class="inner-page-slider">
			<div class="carousel-wrap">
				@if(isset($blocks['BUSINESS-CLIENT-SLIDER'][0]->children))
					<div class="owl-carousel">
						@foreach($blocks['BUSINESS-CLIENT-SLIDER'][0]->children as $key => $block)
							<div class="item">
								<div class="inner-page-slider-text-wrapper"
								     style="background:url('{{ asset($block->photo) }}') no-repeat top;">
									<div class="container">
										<h2>{{ $block->name }}</h2>
										{!! contentRender($block->content) !!}
										<div class="slider-buttons">
											<a href="{{url('sign-up')}}" class="get-stated-button">{!! $block->description !!}</a>
											<a href="{{ $block->url }}" class="learn-more-slider-button" data-id="Automotive-Dealers">
												<img src="{{ asset('assets/images/button-icon4.png') }}" alt="icon"> Learn More </a></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	@endif

	@if(isset($blocks['BUSINESS-CLIENT-WHO-WE-SERVE']) && isset($blocks['BUSINESS-CLIENT-WHO-WE-SERVE'][0]))
		<div class="inner-about-history-wrapper who-we-servce-wrapper">
			<div class="container">
				<div class="row">
					<!--image about text-->
					<div class="col-md-6">
						<div class=" about-text-inner-history business-text-inner-history">
							<h2>{{ $blocks['BUSINESS-CLIENT-WHO-WE-SERVE'][0]->name }}</h2>
							<p>{!! $blocks['BUSINESS-CLIENT-WHO-WE-SERVE'][0]->description !!}</p>
							@if(isset($blocks['BUSINESS-CLIENT-WHO-WE-SERVE'][0]->children))
								<ul class="row">
									@foreach($blocks['BUSINESS-CLIENT-SLIDER'][0]->children as $key => $block)
										<li class="col-md-6 col-sm-6 col-xs-6">
											<a href="javascript:void(0)" class="learn-more-slider-button"
											   data-id="{{ str_slug($block->name) }}">{{ $block->name }}</a></li>
									@endforeach
								</ul>
							@endif
						</div>
					</div>
					<!--image about text-->
					<!--image inner about-->
					<div class="col-md-6">
						<div class="about-image-wrp business-image-wrp business-new-image-wrp">
							<img src="{{ asset($blocks['BUSINESS-CLIENT-WHO-WE-SERVE'][0]->photo) }}"
							     alt="image">
						</div>
					</div>
					<!--image inner about-->
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['BUSINESS-CLIENT-MORE-INFORMATION']) && isset($blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]))
		<div class="top-slider-section-tabs-wrp">
			<div class="container">
				<h2>{{ $blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]->name }}</h2>
				<div class="row">
					<div role="tabpanel">
						<div class="col-sm-3">
							@if(isset($blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]->children))
								<ul class="nav nav-pills brand-pills nav-stacked" role="tablist">
									@foreach($blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]->children as $key => $block)
										<li role="presentation" class="brand-nav @if($loop->first) active @endif">
											<a href="#tab{{ $key }}" aria-controls="tab{{ $key }}" role="tab" data-toggle="tab"
											   id="{{ str_slug($block->name) }}">{{ $block->name }}</a></li>
									@endforeach
								</ul>
							@endif
						</div>
						<div class="col-sm-9">
							@if(isset($blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]->children))
								<div class="tab-content">
									@foreach($blocks['BUSINESS-CLIENT-MORE-INFORMATION'][0]->children as $key => $block)
										<div role="tabpanel" class="tab-pane @if($loop->first) active @endif" id="tab{{ $key }}">
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

	@if(isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED']) && isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]))
		<div class="service-wrapper inner-service-wrapper" style="background:#ebebeb">
			<div class="container">
				<h1>{{ $blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]->name }}</h1>
				@if(isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]->children))
					<ul class="row">
						@foreach($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]->children as $key => $block)
							@if($loop->last)
								<li class="col-md-4 col-sm-3 col-xs-2"></li>
							@endif
							<li class="col-md-4 col-sm-6 col-xs-12">
								<div class="service-listing-wrp">
									<div class="service-listing-image">
										<img src="{{ asset($block->icon) }}" alt="service-icon"></div>
									<div class="service-listing-text">
										<h2>{{ $block->name }}</h2>
										<p>{!! $block->description !!}</p>
										<div class="button-service-readmore">
											<a href="#" data-toggle="modal" data-target="#service-offered-{{ $key }}">Read More</a>
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

	@if(isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED']) && isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]) && isset($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]->children))
		<div class="service-popup-wrapper">
			@foreach($blocks['BUSINESS-CLIENT-SERVICES-OFFERED'][0]->children as $key => $block)
				<div id="service-offered-{{ $key }}" class="modal fade" role="dialog">
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

	@if(isset($blocks['BUSINESS-CLIENT-BENEFITS']) && isset($blocks['BUSINESS-CLIENT-BENEFITS'][0]))
		<div class="middle-mutli-role-heading">
			<div class="container"><strong> <img src="{{ asset($blocks['BUSINESS-CLIENT-BENEFITS'][0]->photo) }}" alt="truck">
				</strong>
				<h1>
					<span class="heading-benefits">{{ $blocks['BUSINESS-CLIENT-BENEFITS'][0]->name }}</span>
					@if(isset($blocks['BUSINESS-CLIENT-BENEFITS'][0]->children))
						<a href="#" class="typewrite" data-period="500"
						   data-type='[@foreach($blocks['BUSINESS-CLIENT-BENEFITS'][0]->children as $key => $block) "{{ $block->name }}" @if(!$loop->last),@endif @endforeach]'>
							<span class="wrap"></span>
						</a>
					@endif
				</h1>
			</div>
		</div>
	@endif

	@if(isset($blocks['BUSINESS-CLIENT-WHY-USE']) && isset($blocks['BUSINESS-CLIENT-WHY-USE'][0]))
		<div class="service-wrapper" style="background:none;">
			<div class="container">
				<h1>{{ $blocks['BUSINESS-CLIENT-WHY-USE'][0]->name }}</h1>
				<p>{!! $blocks['BUSINESS-CLIENT-WHY-USE'][0]->description !!}</p>
				@if(isset($blocks['BUSINESS-CLIENT-WHY-USE'][0]->children))
					<ul class="row">
						@foreach($blocks['BUSINESS-CLIENT-WHY-USE'][0]->children as $key => $block)
							<li class="@if($key == 6) col-md-offset-2 col-md-4 col-sm-6 col-xs-12 @else col-md-4 col-sm-6 col-xs-12 @endif">
								<div class="service-listing-wrp">
									<div class="service-listing-image"><img src="{{ asset($block->icon) }}" alt="service-icon"></div>
									<div class="service-listing-text">
										<h2>{{ $block->name }}</h2>
										<p>{!! $block->description !!}</p>
										<div class="button-service-readmore">
											<a href="#" data-toggle="modal" data-target="#why-use-{{ $key }}">Read More</a>
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

	@if(isset($blocks['BUSINESS-CLIENT-WHY-USE']) && isset($blocks['BUSINESS-CLIENT-WHY-USE'][0]) && isset($blocks['BUSINESS-CLIENT-WHY-USE'][0]->children))
		<div class="service-popup-wrapper">
			@foreach($blocks['BUSINESS-CLIENT-WHY-USE'][0]->children as $key => $block)
				<div id="why-use-{{ $key }}" class="modal fade" role="dialog">
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
      let TxtType = function (el, toRotate, period) {
          this.toRotate = toRotate;
          this.el = el;
          this.loopNum = 0;
          this.period = parseInt(period, 10) || 2000;
          this.txt = '';
          this.tick();
          this.isDeleting = false;
      };

      TxtType.prototype.tick = function () {
          let i = this.loopNum % this.toRotate.length;
          let fullTxt = this.toRotate[i];

          if (this.isDeleting) {
              this.txt = fullTxt.substring(0, this.txt.length - 1);
          } else {
              this.txt = fullTxt.substring(0, this.txt.length + 1);
          }

          this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

          let that = this;
          let delta = 200 - Math.random() * 100;

          if (this.isDeleting) {
              delta /= 2;
          }

          if (!this.isDeleting && this.txt === fullTxt) {
              delta = this.period;
              this.isDeleting = true;
          } else if (this.isDeleting && this.txt === '') {
              this.isDeleting = false;
              this.loopNum++;
              delta = 500;
          }

          setTimeout(function () {
              that.tick();
          }, delta);
      };

      window.onload = function () {
          let elements = document.getElementsByClassName('typewrite');
          for (let i = 0; i < elements.length; i++) {
              let toRotate = elements[i].getAttribute('data-type');
              let period = elements[i].getAttribute('data-period');
              if (toRotate) {
                  new TxtType(elements[i], JSON.parse(toRotate), period);
              }
          }
          // INJECT CSS
          let css = document.createElement("style");
          css.type = "text/css";
          css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
          document.body.appendChild(css);
      };
	</script>
	<script>
      $(document).on('click', '.learn-more-slider-button', function () {
          let divTop = $(".top-slider-section-tabs-wrp").offset().top - 160;
          $('html, body').animate({
              scrollTop: divTop
          }, 1000);
          let id = $(this).data('id');
          $('#' + id).click();
      });
	</script>
@endsection
