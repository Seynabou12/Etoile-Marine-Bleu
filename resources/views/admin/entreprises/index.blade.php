
@extends('layouts.admin')

@section('title','Entreprises')
@section('actions')
@include('partials.components.headerPageElemenent',['isModal'=>true,'title'=>__('Nouvelle entreprise')])
@endsection
@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>Nom</td>
            <td>Candidats</td>
            <td>Actions</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($entreprises as $entreprise)
        <tr>
            <td>{{ $i }} </td>
            <td>{{  $entreprise->name ?? '---' }}</td>
            <td>{{  $entreprise->candidats? count($entreprise->candidats) : '---' }}</td>
            <td>
                <a href="{{ route('admin.entreprises.show', $entreprise->id) }}" id="{{ $entreprise->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('admin.candidats.modal',[
        'route' => 'admin.entreprises.store',
        'titre'=>__('Nouvelle entreprise'),
        'titre2'=> __('Modification'),
        'data'=>[
            0=>[
                'label'=>__('Nom'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'name',
                'id'=>'_entreprise',
                'id2'=>'entreprise',
                'input'=>'text',
                'required'=>true,
            ],

        ]
    ])
    @include('layouts.sub_layouts.datatable')

@endsection

@section('scriptBottom')
<script>
    @if (count($errors) > 0)
        $('#creationModal').modal('show');
        // $('#editModal').modal('show');
    @endif
    $('body').on('click', '.editModal', function() {
        $('#form').attr('action', $(this).attr('href'));
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
    });
</script>
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection
