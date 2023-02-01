
@extends('layouts.admin')

<?php $espace = isset($espace) ? $espace : 'admin'; ?>
@section('title', __('Formations'))
@section('actions')
   
    @include('partials.components.headerPageElemenent',['isModal'=>true,'title'=>__('Nouvelle Formation')])
@endsection

@section('content')
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td style="width:100px !important">{{ __('Nom de la Formation') }}</td>
            <td>{{ __('Description') }}</td>
            <td class="text-center">{{ __('Sessions') }}</td>
            <td>{{ __('Actions') }}</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @isset($formations)
            @foreach ($formations as $formation)
            <tr>
                <td>{{ $i }} </td>
                <td>{{ $formation->name }}</td>
                <td>{{  Str::of($formation->description)->limit(80) }}</td>
                <td class="text-center">
                    <span class="badge badge-warning">
                        {{ count($formation->sessions) }}</td>
                    </span>
                <td>
                    <a href="{{ route($espace.'.formations.show', $formation->id) }}" id="{{ $formation->id }}" class="btn btn-primary btn-sm formation">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route($espace.'.formations.update', $formation->id)  }}"
                        class="btn btn-warning btn-sm editModal"
                        type="button"
                        data-toggle="modal"
                        data-name        = "{{ $formation->name }}"
                        data-description        = "{{ $formation->description }}"
                        data-prix        = "{{ $formation->prix }}"
                        data-status        = "{{ $formation->status }}"
                        data-target="#editModal">
                        <i class="fa fa-edit"></i>

                    </a>

                    @include('partials.components.deleteBtnElement',[
                        'url'=>route('admin.formations.destroy',$formation->id),
                        'class'=> 'btn btn-sm btn-danger',
                        'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$formation->name,
                        'entity'=>$formation
                    ])

                </td>
            </tr>
            @php $i++ @endphp
            @endforeach
        @endisset

    @endsection

    @include('admin.formations.modal',[
        'route' => 'admin.formations.store',
        'titre'=>__('Nouvelle formation'),
        'titre2'=> __('Modification'),
        'data'=>[
            0=>[
                'label'=>__('Nom'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'name',
                'input'=>'text',
                'id'=>'_name',
                'id2'=>'name',
                'required'=>true
            ],
            1=>[
                'label'=>__('Description'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'description',
                'id'=>'_description',
                'id2'=>'description',
                'input'=>'textarea',
                'required'=>true
            ],

        ]
    ])  
    @include('layouts.sub_layouts.datatable')

@endsection

@section('scriptBottom')
    <script>
        @if (count($errors) > 0)
            $('#creationModal').modal('show');
        @endif
        $('body').on('click', '.editModal', function() {
            $('#form').attr('action', $(this).attr('href'));
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#description').val($(this).data('description'));
            $('#prix').val($(this).data('prix'));
            $('#status').val($(this).data('status'));
        });
    </script>

    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection

