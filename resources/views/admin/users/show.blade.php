@extends('layouts.admin')

@section('title', __('dashboard.visualisation'))
@section('actions')
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary radius-30" style="margin: -10px 0;color:#fff !important">
        <i class="nav-icon fas fa-chevron-left mr-1"></i>
        {{ __('dashboard.retour') }}
    </a>
@endsection
@section('content')
    {{-- Contenu de la page --}}
    @include('admin.users.fiche')
@endsection
