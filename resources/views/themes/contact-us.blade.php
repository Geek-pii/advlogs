@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
	<!--get in touch-->
	@if(isset($blocks['CONTACT-US-GET-IN-TOUCH']) && isset($blocks['CONTACT-US-GET-IN-TOUCH'][0]))
	<div class="get-in-touch-wrapper">
		<div class="container">
			<h2>{{ $blocks['CONTACT-US-GET-IN-TOUCH'][0]->name }}</h2>
			<p>{!! $blocks['CONTACT-US-GET-IN-TOUCH'][0]->description !!}</p>
			<div class="contact-address-info">
				@if(isset($blocks['CONTACT-US-GET-IN-TOUCH'][0]->children))
				<ul class="row">
					@foreach($blocks['CONTACT-US-GET-IN-TOUCH'][0]->children as $key => $block)
					<li class="col-md-3 col-sm-6 col-xs-12">
						<div class="listing-contact-address"> <span> <img src="{{ asset($block->icon) }}" alt="location"> </span>
							<div class="list-text-detail-adress">
								<h2>{{ $block->name }}</h2>
								<p>{!! $block->description !!}</p>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
	@endif
	<!--get in touch-->

	<div class="contact-inner-form-wrapper" id="contact-inner-form-wrapper">
		<div class="container">
			<div class="leave-us-message-wrapper">
				<h1> Send us an Email </h1>
        @include('admin.layouts.parts.message')
				<form class="row" method="POST" action="{{ route('contact.post') }}">
          @csrf
					<div class="col-md-6">
						<div class="form-group">
							<label> First Name* </label>
							<input type="text" name="first_name" class="form-control" placeholder="First Name ">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Last Name* </label>
							<input type="text" name="last_name" class="form-control" placeholder="Last Name ">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Phone Number</label>
							<input type="text" name="phone" class="form-control" placeholder="Phone Number">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label> Send Email To </label>
							<select name="department" class="form-control" style="padding-left:0; margin-left:-5px">
								<option value="">Select a Department</option>
								@foreach($departments as $department)
                <option value="{{ $department->name }}">{{ $department->name }}</option>
                @endforeach
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="text-area-group">
							<textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
						</div>
					</div>
					<div class="col-md-6 col-xl-12">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="{{ config('services.captcha.site_key') }}"></div>
          </div>
          <div class="col-md-6 col-xl-12">
						<div class="form-button-contact">
							<input type="submit" value="Send Your Message" class="contact-button">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
