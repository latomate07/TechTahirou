<x-mail::message>
Hey le boss,<br>
{{ $name }} vient d'envoyer un message sur {{ env('APP_NAME') }}.

<b>Message :</b><br>
{{ $message }}

<x-mail::button :url="env('APP_URL')">
Répondre
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
