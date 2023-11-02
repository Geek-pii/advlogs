@php
    $step = auth()
        ->guard('account')
        ->user()->account_step_number;
@endphp
<div class="step-listing-wrapper">
    <ul>
        <li>
            <div
                class="listing-text-steps {{ $step >= 5? 'active-bg-step': '' }}">
                <span>
                    @if ($step >= 5)
                        <a href="{{ route('account.carrier.company-profile', ['pass_step' => true]) }}">1</a>
                    @else
                        1
                    @endif
                </span>
                <strong> Profile </strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step >= 6? 'active-bg-step': '' }}">
                <span>
                    @if ($step >= 6)
                        <a href="{{ route('account.carrier.agreement', ['pass_step' => true]) }}">2</a>
                    @else
                        2
                    @endif
                </span>
                <strong> Documents </strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step >= 7? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 7)
                        <a href="{{ route('account.carrier.load', ['pass_step' => true]) }}">3</a>
                    @else
                        3
                    @endif
                </span>
                <strong> Loads </strong>
            </div>
        </li>
        <li>
            <div
                class="listing-text-steps {{ $step > 12? 'active-bg-step': '' }}">
                <span>
                    @if ($step > 12)
                        <a href="{{ route('account.carrier.payment', ['pass_step' => true]) }}">4</a>
                    @else
                        4
                    @endif
                </span>
                <strong> Payments </strong>
            </div>
        </li>
    </ul>
</div>
