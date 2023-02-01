@extends('layouts.admin')
@section('title', __('dashboard.profil'))
@section('content')
    <style>
        .tab-height{
            overflow-y: auto;
            height: 350px !important;
        }
        .step{
            display: none;
        }
        .step.active{
            display: block;
        }
        button.next-step{
            float: right;
        }
        button.next-step{
            float: left;
        }
    </style>
    {{-- Contenu de la page --}}
    @if($_user && $_user->eleve)
        @include('account.fiche-eleve', ['user' => $_user])
    @else

    @endif

    @include('students.account.modal')
    @section('scriptBottom')
    <script  src="{{ asset('js/multistep.js') }}"></script>
@endsection
@endsection
