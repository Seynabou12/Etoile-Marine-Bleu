@extends('layouts.admin')

@section('title', $title ?? "Détails entreprise #$entreprise->id")

@section('actions')
    @if ($_user->is_super_admin || $_user->is_profil_admin)
        <a href="{{ route('comptes.users.updateUsers') }}"
            class="btn btn-sm btn-primary" style="margin: -10px 0;color:#fff !important">
            <i class="fas fa-sync mr-1"></i> Mettre à jour les utilisateurs

        </a>
    @endif
@endsection
@section('content')
    {{-- Contenu de la page --}}
    @include('admin.entreprises.fiche', ['compte_ftp' => $entreprise->compte_ftp])
    <div class="d-none">
        @if (isset($users) && ($_user->is_profil_admin))
            <div class="col-12">
                <hr>
                <h3 class="h5 font-italic font-weight-bold text-primary">Les utilisateurs de l'entreprise</h3>
            </div>
            <!-- Dropdown - User Information -->
            @section('tableHeader')
                <tr>
                    <td>N°</td>
                    <td style="width:100px !important">Prénom</td>
                    <td>Nom</td>
                    <td>Email</td>
                    <td>Profil</td>
                    <td>Entreprise</td>
                    <td>Actions</td>
                </tr>
            @endsection

            {{-- Table Body --}}
            @section('tableBody')
                @php $i = 1 @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i }} </td>
                        <td>{{ $user->fname ?? '---' }}</td>
                        <td>{{ $user->name ?? '---' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->profil_name ?? '---' }}</td>
                        <td>{{ $user->entreprise->name ?? '---' }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" id="{{ $user->id }}"
                                class="btn btn-primary btn-sm user">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            @endsection

            {{-- Datatable extension --}}
            @include('layouts.sub_layouts.datatable')
        @endif
    </div>
@endsection

@section('scriptBottom')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/ftpConnectionTest.js') }}"></script>
    {{-- <script>
        swal("My title", "My description", "error");
    </script> --}}
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection
