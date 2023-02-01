@extends('layouts.admin')

@section('title', $title ?? "Modification de l'utilisateur")

@section('content')
    <div class="col-md-12">
        <form method="POST" action="{{ route('comptes.users.update', $user) }}" class="card-body rounded bg-white">
            @csrf
            @method("PATCH")
            {{-- Contenu de la page --}}
            <div class="row">
                @include('admin.users.form')
            </div>

            <div class="text-right">
                <hr>
                <button type="submit" class="btn btn-primary rounded">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
