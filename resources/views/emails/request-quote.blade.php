@component('mail::message')

{{ $data->message }}<br>

From : {{ $data->email }}<br>
Name : {{ $data->first_name }} {{ $data->last_name }}<br>
Phone : {{ $data->phone_number }}<br>
# Vehicle Info<br>
Pick-up Zip Code : {{ $data->picking_zip }}<br>
Delivery Zip Code : {{ $data->delivery_zip }}<br>
Preferred Pick up date : {{ $data->preferred_pick_up_date }}<br>
Year : {{ $data->year }}<br>
Make : {{ $data->make }}<br>
Model : {{ $data->model }}<br>

Condition : {{ $data->condition }}<br>
Run Drives : {{ $data->run_drives }}<br>
Roll Steer Brakes : {{ $data->rolls_steers_brakes }}<br>
Transport Type : {{ $data->transport_type }}<br>
Transport Speed : {{ $data->transport_speed }}<br>

@if($data->modification_description)
Is Modifications : Yes<br>
Modification Description : {{ $data->modification_description }}<br>
@else
Is Modifications : No<br>
@endif

<!-- Thanks,<br> -->
{{ config('app.name') }}
@endcomponent
