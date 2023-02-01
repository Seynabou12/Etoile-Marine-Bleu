@extends('layouts.admin')
@section('title',__('dashboard.tableau_de_bord'))

@section('actions')
    <span class="bg-primary px-2 h6 my-0 rounded">
    </span>
@endsection

<style>
    .tab-height{
        overflow-y: auto;
        height: 350px !important;
    }
</style>

@section('content')

    <div class="">
        <div class="row justify-content-left">
            <div class="col-12">
                <div class="row">
                    @include('admin.dashboard.component',[
                        'data'=>$formations??[],
                        'title'=>__('Formations'),
                        'route'=>'admin.formations.index',
                        'col'=>'col-lg-3 col-6',
                        'icone'=>'fa-users'
                    ])
                    @include('admin.dashboard.component',[
                        'data'=>$sessions??[],
                        'title'=>__('Sessions'),
                        'route'=>'admin.sessions.index',
                        'col'=>'col-lg-3 col-6',
                        'icone'=>'fa-users'
                    ])
                   
                    @include('admin.dashboard.component',[
                        'data'=>$candidats??[],
                        'title'=>__('Candidats'),
                        'route'=>'admin.candidats.index',
                        'col'=>'col-lg-3 col-6',
                        'icone'=>'fa-users'
                    ])
                    @include('admin.dashboard.component',[
                        'data'=>$sessions??[],
                        'title'=>__('Sessions en cours'),
                        'route'=>'admin.sessions.index',
                        'col'=>'col-lg-3 col-6',
                        'icone'=>'fa-file'
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
