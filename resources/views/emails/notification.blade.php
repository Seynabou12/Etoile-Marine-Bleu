@component('mail::message')
# {{ isset($complement_subject) ? $complement_subject :'Bonjour' }}

{{ 'Nom Complet' }}, <br>
# Réinitialisation mot de passe


{{ $user->nom_complet??'' }}, <br>
{!! isset($content) ? $content : '' !!}

Pour réinitialiser votre mot de passe, veuillez cliquez sur le lien ci dessous.

@component('mail::button', ['url' => $url??''])
    Réinitialiser mot de passe
@endcomponent

@component('mail::panel')
    Le lien va expirer dans 60 minutes.
@endcomponent

Cordialements,<br>

{{ config('app.name') }} - MyRevo
@endcomponent
