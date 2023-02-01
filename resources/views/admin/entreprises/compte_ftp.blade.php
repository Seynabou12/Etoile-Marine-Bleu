@extends('layouts.admin')

@section('title', $title ?? "Compte FTP:  #$entreprise->name")

@section('content')
    {{-- Contenu de la page --}}
    <div class="col-md-12">
        <form method="POST" class="card-body rounded bg-white">
            @csrf
            @include('admin.entreprises.form_ftp')
        </form>
    </div>
@endsection
