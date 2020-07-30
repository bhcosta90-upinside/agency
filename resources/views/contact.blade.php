@component('mail::message')
Olá, você recebeu um novo contato do seu site

Nome: <b>{{ $replay_name }}</b>

Email: <b>{{ $replay_email }}</b>

Sobre: <b>{{ $subject }}</b>

@component('mail::panel')
    {{ $message }}
@endcomponent
@endcomponent
