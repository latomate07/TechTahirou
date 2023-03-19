<x-mail::message>
Salut {{ $name }}, <br><br>
Je vous confirme avoir reçu votre mail. Je vous répondrai le plus vite possible. <br>
Notez que ceci est un mail automatique. 

<x-mail::button :url="env('APP_URL')">
Retourner sur le site
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
