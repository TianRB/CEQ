@component('mail::message')
# Hola {{$message->name}}

Recibimos satisfactoriamente tu mensaje:
<br>
"*{{$message->message}}*"
<br>

En breve un operador se pondrá en contacto y resolverá todas tus dudas.


Atentamente,<br>
{{ config('app.name') }}
@endcomponent
