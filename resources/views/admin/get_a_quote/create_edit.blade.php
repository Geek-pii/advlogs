@extends("admin.layouts.master")

@section("content")
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">

					@include("admin.layouts.parts.message")

					@component('admin.layouts.components.form', [
						'form_method' => 'PUT',
						'form_url' => route("admin.get.a.quote.update", $get_a_quote->id)
					])
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.picking_zip") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="picking_zip"
										       value="{{ $get_a_quote->picking_zip ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.delivery_zip") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="delivery_zip"
										       value="{{ $get_a_quote->delivery_zip ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.preferred_pick_up_date") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="preferred_pick_up_date"
										       value="{{ $get_a_quote->preferred_pick_up_date ?? '' }}">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.year") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="year"
										       value="{{ $get_a_quote->year ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.make") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="make"
										       value="{{ $get_a_quote->make ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.model") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="model"
										       value="{{ $get_a_quote->model ?? '' }}">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.condition") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="condition"
										       value="{{ $get_a_quote->condition ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.run_drives") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="run_drives"
										       value="{{ $get_a_quote->run_drives ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.rolls_steers_brakes") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="rolls_steers_brakes"
										       value="{{ $get_a_quote->rolls_steers_brakes ?? '' }}">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.transport_type") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="transport_type"
										       value="{{ $get_a_quote->transport_type ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.transport_speed") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="transport_speed"
										       value="{{ $get_a_quote->transport_speed ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.is_modifications") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="is_modifications"
										       value="{{ $get_a_quote->is_modifications ?? '' }}">
									</div>
								</div>
							</div>
              <div class="col-md-12">
                <div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.modification_description") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<textarea name="modification_description" class="form-control" rows="3">{{ $get_a_quote->modification_description ?? '' }}</textarea>
									</div>
								</div>
              </div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.first_name") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="first_name"
										       value="{{ $get_a_quote->first_name ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.last_name") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="last_name"
										       value="{{ $get_a_quote->last_name ?? '' }}">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.email_address") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="email_address"
										       value="{{ $get_a_quote->email_address ?? '' }}">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="font-bold col-blue">{!! trans("admin_get_a_quote.form.phone_number") !!}</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" name="phone_number"
										       value="{{ $get_a_quote->phone_number ?? '' }}">
									</div>
								</div>
							</div>
						</div>

						{{--Buttons--}}
						@include("admin.layouts.partials.form_buttons", [
								"cancel" => route("admin.get.a.quote.index")
						])
					@endcomponent

				</div>
			</div>
		</div>
	</div>
@endsection

@section("script")
	<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

	@if($composer_locale !== 'en')
		<script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
		        type="text/javascript"></script>
	@endif

	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/get_a_quote.create.js') }}"></script>
@endsection
