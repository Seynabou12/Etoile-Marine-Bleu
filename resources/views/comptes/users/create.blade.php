@extends('layouts.admin')

@section('title', $title ?? "Création d'un nouvel utilisateur")

@section('content')
    <div class="col-md-12">
        <form method="POST" action="{{ route('comptes.users.store', $user) }}" class="card-body rounded bg-white">
            @csrf
            {{-- Contenu de la page --}}
            <div class="row">
                @include('admin.users.form')
            </div>

            <div class="text-right">
                <hr>
                <button type="submit" class="btn btn-primary rounded">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
