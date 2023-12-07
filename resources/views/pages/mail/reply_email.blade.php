@component('mail::message')

# Hi {{ $name }},
{{-- # {{ $senderMessage }} --}}
  
  
Receive  your email. I will try quicly answer.
  
Thanks,

{{ config('app.name') }}
@endcomponent
