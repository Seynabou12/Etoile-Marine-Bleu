@component('mail::message')
# {{ isset($complement_subject) ? $complement_subject :'Bonjour' }}

{{ 'Nom Complet' }}, <br>
# RĂ©initialisation mot de passe


{{ $user->nom_complet??'' }}, <br>
{!! isset($content) ? $content : '' !!}

Pour rĂ©initialiser votre mot de passe, veuillez cliquez sur le lien ci dessous.

@component('mail::button', ['url' => $url??''])
    RĂ©initialiser mot de passe
@endcomponent

@component('mail::panel')
    Le lien va expirer dans 60 minutes.
@endcomponent

Cordialements,<br>

{{ config('app.name') }} - MyRevo
@endcomponent
