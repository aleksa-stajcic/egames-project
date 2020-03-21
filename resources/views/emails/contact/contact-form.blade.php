{{-- From: {{ $Username }} <br>
Email: {{ $Email }} <br>

{{ $Message }} --}}

@component('mail::message')
# Admin contact
## {{ $Subject }}

<b>From: </b>{{ $Username }} <br>
<b>Email: </b>{{ $Email }} <br>

@component('mail::panel')
{{ $Message }}
@endcomponent

Thanks
@endcomponent



