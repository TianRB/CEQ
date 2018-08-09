@component('mail::message')
# ¡Se han comunicado con nosotros!


{{$message->name}} nos ha escrito: <br>
"{{$message->message}}"
<br>
<br>
Comunícate con {{$message->name}}: <br>
**Correo:** {{$message->email}} <br>
**Teléfono:** {{$message->phone}}

**Atentamente**,<br>
{{ config('app.name') }}
@endcomponent
