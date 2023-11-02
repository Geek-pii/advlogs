@component('mail::message')
# Email To: {{ $data->department }}<br>
From : {{ $data->email }}<br>
Name : {{ $data->first_name }} {{ $data->last_name }}<br>
Phone : {{ $data->phone }}<br>

{{ $data->message }}

<!-- Thanks,<br> -->
{{ config('app.name') }}
@endcomponent
