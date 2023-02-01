@extends('layouts.admin')

@section('title', __('dashboard.nouvel_utilisateur'))

@section('content')
    <div class="col-md-12">
        <form method="POST" action="{{ route('admin.users.store', $user) }}" class="card-body rounded bg-white">
            @csrf
            {{-- Contenu de la page --}}
            <div class="row">
                @include('admin.users.form')
            </div>

            <div class="text-right">
                <hr>
                <button type="submit" class="btn btn-primary rounded">{{ __('dashboard.enregistrer') }}</button>
            </div>
        </form>
    </div>
@endsection
