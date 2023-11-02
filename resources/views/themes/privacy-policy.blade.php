@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
    @if(isset($blocks['PRIVACY-POLICY-1']) && isset($blocks['PRIVACY-POLICY-1'][0]))
		<div class="">
			<div class="container">
				<div class="row">
					<!--image about text-->
					<div class="col-md-12">
						<div class="about-text-inner-history business-text-inner-history inner-new-about-image-wrp">
							<h2 class="text-center">{{ $blocks['PRIVACY-POLICY-1'][0]->name }}</h2>
							{!! contentRender($blocks['PRIVACY-POLICY-1'][0]->content) !!}
						</div>
					</div>
					<!--image about text-->
				</div>
			</div>
		</div>
	@endif

@endsection
