@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
	@if(isset($blocks['ABOUT-US-OUR-HISTORY']) && isset($blocks['ABOUT-US-OUR-HISTORY'][0]))
		<div class="inner-about-history-wrapper">
			<div class="container">
				<div class="row">
					<!--image inner about-->
					<div class="col-md-6">
						<div class="image-new-about-style">
							<img src="{{ asset($blocks['ABOUT-US-OUR-HISTORY'][0]->photo) }}"
							     alt="image"></div>
					</div>
					<!--image inner about-->

					<!--image about text-->
					<div class="col-md-6">
						<div class="about-text-inner-history business-text-inner-history inner-new-about-image-wrp">
							<h2>{{ $blocks['ABOUT-US-OUR-HISTORY'][0]->name }}</h2>
							{!! contentRender($blocks['ABOUT-US-OUR-HISTORY'][0]->content) !!}
						</div>
					</div>
					<!--image about text-->
				</div>
			</div>
		</div>
	@endif

	@if(isset($blocks['ABOUT-US-FEATURES']) && isset($blocks['ABOUT-US-FEATURES'][0]))
		<div class="key-features-wrapper">
			<div class="container">
				<h1>{{ $blocks['ABOUT-US-FEATURES'][0]->name }}</h1>
				<p>{!! $blocks['ABOUT-US-FEATURES'][0]->description !!}</p>
				@if(isset($blocks['ABOUT-US-FEATURES'][0]->children))
					<ul class="row">
						@foreach($blocks['ABOUT-US-FEATURES'][0]->children as $key => $block)
							<li class="col-md-4 col-sm-4 col-xs-12">
								<div class="listing-key-feature-wrp">
									<div class="listing-key-feature-icon">
										<img src="{{ asset($block->icon) }}" alt="feature-img"></div>
									<h3>{{ $block->name }}</h3>
									<p>{!! $block->description !!}</p>
								</div>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	@endif

	@if(isset($blocks['ABOUT-US-GRID']) && isset($blocks['ABOUT-US-GRID'][0]) && isset($blocks['ABOUT-US-FEATURES'][0]->children))
		@foreach($blocks['ABOUT-US-GRID'][0]->children as $key => $block)
			<div class="about-wrapper inner-about-wrapper">
				<div class="container-fluid">
					<div class="row">
					@if($key%2 == 0)
						<!--about text-->
							<div class="col-md-6">
								<div class="about-text-wrapper">
									<h2>{{ $block->name }}</h2>
									{!! contentRender($block->content) !!}
									<div class="button-about-inner"><a href="{{ $block->url }}"> Learn More </a></div>
								</div>
							</div>
							<!--about text-->

							<!--about image-->
							<div class="col-md-6">
								<div class="about-image-wrp"
								     style="background:url('{{ asset($block->photo) }}') no-repeat top; height:650px; background-size:cover !important"></div>
							</div>
							<!--//about image-->
					@else
						<!--about image-->
							<div class="col-md-6">
								<div class="about-image-wrp"
								     style="background:url('{{ asset($block->photo) }}') no-repeat top; height:650px; background-size:cover !important"></div>
							</div>
							<!--//about image-->

							<!--about text-->
							<div class="col-md-6">
								<div class="about-text-wrapper">
									<h2>{{ $block->name }}</h2>
									{!! contentRender($block->content) !!}
									<div class="button-about-inner"><a href="{{ $block->url }}"> Learn More </a></div>
								</div>
							</div>
							<!--about text-->
						@endif
					</div>
				</div>
			</div>
		@endforeach
	@endif
@endsection
