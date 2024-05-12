<x-mail::message>

La personne {{$prenom}} {{$name}} vous a envoyé un message

Numéro de téléphone : {{$phone}}

Voici le message qu'elle a envoyé : {{$message}}

<x-mail::button :url="route('index')">
Consultez le site
</x-mail::button>

Merci,<br>
</x-mail::message>
