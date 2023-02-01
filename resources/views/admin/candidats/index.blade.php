
@extends('layouts.admin')

<?php $espace = isset($espace) ? $espace : 'admin'; ?>
@section('title', __('Candidats'))
@section('actions')
    
    @include('partials.components.headerPageElemenent',['isModal'=>true,'title'=>__('Nouveau candidat')])
@endsection

@section('content')
    <!-- Dropdown - candidat Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>{{ __('Entreprise') }}</td>
            <td>{{ __('Nom') }}</td>
            <td>{{ __('Prénom') }}</td>
            <td>{{ __('Adresse') }}</td>
            <td>{{ __('Téléphone') }}</td>
            <td>{{ __('Etat') }}</td>
            <td>{{ __('Action') }}</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @isset($candidats)
            @foreach ($candidats as $candidat)
            <tr>
                <td>{{ $i }} </td>
                <td>{{ $candidat->entreprise ? $candidat->entreprise->name : '---'  }}</td>
                <td>{{ $candidat->nom }}</td>
                <td>{{ $candidat->prenom }}</td>
                <td>{{ $candidat->adresse }}</td>
                <td>{{ $candidat->telephone }}</td>
                <td>{!! $candidat->etat ?? '---' !!}</td>
                <td>
                    {{-- <a href="{{ route($espace.'.candidats.show', $candidat->id) }}" id="{{ $candidat->id }}" class="btn btn-primary btn-sm candidat">
                        <i class="fa fa-eye"></i>
                    </a> --}}
                    <a href="{{ route($espace.'.candidats.update', $candidat->id)  }}"
                        class="btn btn-warning btn-sm editModal"
                        type="button"
                        data-toggle="modal"
                        data-nom        = "{{ $candidat->nom }}"
                        data-prenom        = "{{ $candidat->prenom }}"
                        data-adresse        = "{{ $candidat->adresse }}"
                        data-telephone        = "{{ $candidat->telephone }}"
                        data-email        = "{{ $candidat->email }}"
                        data-entreprise        = "{{ $candidat->entreprise_id }}"
                        data-target="#editModal">
                        <i class="fa fa-edit"></i>
                    </a>    
                    @include('partials.components.deleteBtnElement',[
                        'url'=>route('admin.candidats.destroy',$candidat->id),
                        'class'=> 'btn btn-sm btn-danger',
                        'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$candidat->name,
                        'entity'=>$candidat
                    ])
                </td>
            </tr>
            @php $i++ @endphp
            @endforeach
        @endisset

    @endsection

    {{-- Datatable extension --}}
    @include('admin.candidats.modal',[
        'route' => 'admin.candidats.store',
        'titre'=>__('Nouveau candidat'),
        'titre2'=> __('Modification'),
        'data'=>[
            0=>[
                'label'=>__('Entreprise'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'entreprise_id',
                'id'=>'_entreprise',
                'id2'=>'entreprise',
                'input'=>'select',
                'required'=>true,
                'list'=>$entreprises??[],
                'label_class'=>'_entreprise'

            ],
            6=>[
                'label'=>__('Entreprise'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'entreprise_name',
                'input'=>'text',
                'id'=>'newEntreprise',
                'id2'=>'_newEntreprise',
                'required'=>false,
                'card_class'=>'_divEntreprise',
            ],
            1=>[
                'label'=>__('Nom'),
                'placeholder'=>"",
                'col' =>'col-6',
                'name'=>'nom',
                'input'=>'text',
                'id'=>'_nom',
                'id2'=>'nom',
                'required'=>true,
            ],
            2=>[
                'label'=>__('Prénom'),
                'placeholder'=>"",
                'col' =>'col-6',
                'name'=>'prenom',
                'id'=>'_prenom',
                'id2'=>'prenom',
                'input'=>'text',
                'required'=>true
            ],
            3=>[
                'label'=>__('Adresse'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'adresse',
                'id'=>'_adresse',
                'id2'=>'adresse',
                'input'=>'text',
                'required'=>true
            ],
            4=>[
                'label'=>__('Téléphone'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'telephone',
                'id'=>'_telephone',
                'id2'=>'telephone',
                'input'=>'number',
                'required'=>true
            ],
            5=>[
                'label'=>__('Email'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'email',
                'id'=>'_email',
                'id2'=>'email',
                'input'=>'email',
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
            // $('#editModal').modal('show');
        @endif
        $('#newEntreprise').hide();
        $('._divEntreprise').hide();
        $('#_entreprise').on('change',function(){
            if($(this).val() == 2){
                $('#newEntreprise').show();
                $('._divEntreprise').show();
                $('#_entreprise').hide();
                $('._entreprise').hide();

            }
        })
        $('body').on('click', '.editModal', function() {
            $('#_newEntreprise').hide();
            $('._divEntreprise').hide();
            $('#form').attr('action', $(this).attr('href'));
            $('#id').val($(this).data('id'));
            $('#nom').val($(this).data('nom'));
            $('#prenom').val($(this).data('prenom'));
            $('#adresse').val($(this).data('adresse'));
            $('#telephone').val($(this).data('telephone'));
            $('#email').val($(this).data('email'));
            var val = $(this).data('entreprise')

            $('#entreprise option[value='+val+']').attr('selected','selected');

        });
    </script>
    
    {{-- <script src="{{ asset('js/scriptConfig.js') }}"></script> --}}
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection
