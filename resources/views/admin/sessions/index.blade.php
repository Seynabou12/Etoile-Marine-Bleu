
@extends('layouts.admin')

<?php $espace = isset($espace) ? $espace : 'admin'; ?>
@section('title', __('Sessions'))
@section('actions')
   
    @include('partials.components.headerPageElemenent',['isModal'=>true,'title'=>__('Nouvelle session')])
@endsection

@section('content')
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>{{ __('Formation') }}</td>
            <td>{{ __('Nom Session') }}</td>
            <td>{{ __('Date Debut Session') }}</td>
            <td>{{ __('Date Fin Session') }}</td>
            <td>{{ __('Status') }}</td>
            <td>{{ __('Action') }}</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @isset($sessions)
            @foreach ($sessions as $session)
            <tr>
                <td>{{ $i }} </td>
                <td>{{ $session->formation ? $session->formation->name : '---'  }}</td>
                <td>{{ $session->name }} </td>
                <td>{{ $session->date_debut }}</td>
                <td>{{ $session->date_fin }}</td>
                <td>{{ $session->status }}</td>
                <td>
                 
                    <a href="{{ route($espace.'.sessions.update', $session->id)  }}"
                        class="btn btn-warning btn-sm editModal"
                        type="button"
                        data-toggle="modal"
                        data-name        = "{{ $session->name }}"
                        data-date_debut        = "{{ $session->date_debut }}"
                        data-date_fin        = "{{ $session->date_fin }}"
                        data-status        = "{{ $session->status }}"
                        data-formation        = "{{ $session->formation_id }}"
                        data-target="#editModal">
                        <i class="fa fa-edit"></i>

                    </a>

                    @include('partials.components.deleteBtnElement',[
                        'url'=>route('admin.sessions.destroy',$session->id),
                        'class'=> 'btn btn-sm btn-danger',
                        'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$session->name,
                        'entity'=>$session
                    ])

                </td>
            </tr>
            @php $i++ @endphp
            @endforeach
        @endisset

    @endsection

    @include('admin.sessions.modal',[
        'route' => 'admin.sessions.store',
        'titre'=>__('Nouvelle session'),
        'titre2'=> __('Modification'),
        'data'=>[
            0=>[
                'label'=>__('Formation'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'formation_id',
                'id'=>'_formation',
                'id2'=>'formation',
                'input'=>'select',
                'required'=>true,
                'list'=>$formations??[],
                'label_class'=>'_formation'

            ],
            6=>[
                'label'=>__('Formation'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'formation_name',
                'input'=>'text',
                'id'=>'newformation',
                'id2'=>'_newformation',
                'required'=>false,
                'card_class'=>'_divFormation',
            ],
            1=>[
                'label'=>__('Nom de la session'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'name',
                'input'=>'text',
                'id'=>'_name',
                'id2'=>'name',
                'required'=>true
            ],
            2=>[
                'label'=>__('Date début de la session'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'date_debut',
                'input'=>'date',
                'id'=>'_date_debut',
                'id2'=>'date_debut',
                'required'=>true
            ],
            3=>[
                'label'=>__('Date fin de la session'),
                'placeholder'=>"",
                'col' =>'col-12',
                'name'=>'date_fin',
                'id'=>'_date_fin',
                'id2'=>'date_fin',
                'input'=>'date',
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
        $('#newFormation').hide();
        $('._divFormation').hide();
        $('#_formation').on('change',function(){
            if($(this).val() == 2){
                $('#newFormation').show();
                $('._divFormation').show();
                $('#_formation').hide();
                $('._formation').hide();

            }
        })
        $('body').on('click', '.editModal', function() {
            $('#_newFormation').hide();
            $('._divFormation').hide();
            $('#form').attr('action', $(this).attr('href'));
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#date_debut').val($(this).data('date_debut'));
            $('#date_fin').val($(this).data('date_fin'));
            $('#status').val($(this).data('status'));
            var val = $(this).data('formation')

            $('#formation option[value='+val+']').attr('selected','selected');


        });
    </script>

    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection

