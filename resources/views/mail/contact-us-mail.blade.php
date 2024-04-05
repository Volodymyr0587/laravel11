<x-mail::message>
# New Contact Form Sumbission

## Name: {{ $contactData['name'] }}

## Email: {{ $contactData['email'] }}

## Message:
{{ $contactData['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
