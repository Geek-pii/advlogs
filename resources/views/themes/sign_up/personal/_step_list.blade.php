@php
    $step = auth()->guard('account')->user()->account_step_number;
@endphp
<div class="step-listing-wrapper">
    <ul>
        <li>
            <div
                class="listing-text-steps {{ $step > 1? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 1)
                        <a href="{{ route('account.personal.quotes', ['pass_step' => true]) }}">1</a>
                    @else
                        1
                    @endif
                </span> <strong>Quote</strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step > 2? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 2)
                        <a href="{{ route('account.personal.agreement', ['pass_step' => true]) }}">2</a>
                    @else
                        2
                    @endif
                </span>
                <strong>Agreement</strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step > 3? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 3)
                        <a href="{{ route('account.pickup.information', ['pass_step' => true]) }}">3</a>
                    @else
                            3
                    @endif
                </span>
                <strong>Pickup</strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step > 4? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 4)
                        <a href="{{ route('account.delivery.information', ['pass_step' => true]) }}">4</a>
                    @else
                        4
                    @endif
                </span>
                <strong>Delivery</strong>
            </div>
        </li>
    </ul>
</div>
