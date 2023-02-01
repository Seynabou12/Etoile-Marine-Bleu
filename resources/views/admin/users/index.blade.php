
@extends('layouts.admin')

<?php $espace = isset($espace) ? $espace : 'admin'; ?>
@section('title',__('dashboard.utilisateurs'))
@section('actions')
    @if ($_user->is_super_admin || $_user->is_profil_admin)
        @include('partials.components.headerPageElemenent',['route'=>'admin.users.create','title'=>__('Ajouter')])
    @endif
@endsection

@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td style="width:100px !important">{{ __('prenom') }}</td>
            <td>{{ __('nom_famille') }}</td>
            <td>{{ __('email') }}</td>
            <td>{{ __('profil') }}</td>
            <td class="text-right">{{ __('actions') }}</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{ $i }} </td>
            <td>{{  $user->collaborateur ? $user->collaborateur->prenom : '---' }}</td>
            <td>{{  $user->collaborateur ? $user->collaborateur->nom : '---'  }}</td>
            <td>{{  $user->email }}</td>
            <td>{{  $user->profil_name ?? '---' }}</td>
            <td class="text-right">
                <a href="{{ route($espace.'.users.show', $user->id) }}" id="{{ $user->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route($espace.'.users.edit', $user->id) }}" class="btn btn-info btn-sm user">
                    <i class="fa fa-edit"></i>
                </a>
                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.users.destroy',$user->id),
                    'class'=> 'btn btn-sm btn-danger',
                    'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$user->name,
                    'entity'=>$user
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach

    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection
