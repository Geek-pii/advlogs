<form>
    <input type="hidden" name="step" value="2">
    <div class="not-use-factor @if($useFactory == 'Y') hidden @endif">
        <div class="row">
            <div class="col-12">
                <h4>Please choose your payment option</h4>
            </div>
        </div>
        <div class="row pl-3 pr-3">
            <div class="col-12 border rounded p-2">
                @foreach ($paymentPlansNotUseFactor as $item)
                    <div class="custom-control custom-radio mb-2">
                        <input type="radio" value="{{ $item->id }}" id="payment_plan{{ $item->id }}" name="payment_plan_id"
                            @if($paymentPlan && $paymentPlan->id == $item->id) checked @endif
                            class="custom-control-input">
                        <label class="custom-control-label" for="payment_plan{{ $item->id }}">
                             Pay me directly in {{ $item->days_paid }} {{ strtolower($item->day_type) }}
                            days with a {{ $item->fee }} discount
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="use-factor @if($useFactory == 'N') hidden @endif">
        <div class="row">
            <div class="col-12 pl-3">
                <h4 class="mb-2"><strong>Get cash fast with less paperwork.</strong></h4>
                <ul class="list-unstyled border-bottom pb-2 mb-2">
                    <li class="d-flex"><span class="mr-1">-</span><strong>Avoid the hassles of sending paperwork to a
                            factoring company.</strong></li>
                    <li class="d-flex"><span class="mr-1">-</span><strong>No confusing statements or hidden fees.</strong>
                    </li>
                    <li class="d-flex"><span class="mr-1">-</span><strong>With a few clicks in the app, we'll have the
                            infomation to get you paid fast.</strong></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>Please choose your payment option</label>
            </div>
        </div>
        <div class="row pl-3 pr-3">
            <div class="col-12 border rounded p-2">
                @foreach ($paymentPlansUseFactor as $item)
                    @if ($item->pay_to == 'Direct')
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" value="{{ $item->id }}" id="payment_plan{{ $item->id }}"
                            @if($paymentPlan && $paymentPlan->id == $item->id) checked @endif
                                name="payment_plan_id" class="custom-control-input">
                            <label class="custom-control-label" for="payment_plan{{ $item->id }}">
                                Skip the factor and pay me directly in {{ $item->days_paid }}
                                {{ strtolower($item->day_type) }}
                                days with a {{ $item->fee }} discount
                            </label>
                        </div>
                    @else
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" value="{{ $item->id }}" id="payment_plan{{ $item->id }}"
                            @if($paymentPlan && $paymentPlan->id == $item->id) checked @endif
                                name="payment_plan_id" class="custom-control-input">
                            <label class="custom-control-label" for="payment_plan{{ $item->id }}">
                                Pay my factoring company company in {{ $item->days_paid }}
                                {{ strtolower($item->day_type) }}
                                days with a {{ $item->fee }} discount
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    
    </div>
</form>
