@component('mail::message')
  # Name: {{ $name }}
 # Email: {{ $email }}<br><br>
 Subject: {{ $sub }} <br>
 Message:<br> {{ $mess }}
  
Thanks,
{{ config('app.name') }}
@endcomponent
