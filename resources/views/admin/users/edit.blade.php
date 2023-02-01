@extends('layouts.admin')

@section('title', __('dashboard.modification_utilisateur'))
@section('actions')
    @if ($_user->is_super_admin || $_user->is_profil_admin)
        @include('partials.components.headerPageElemenent',['urlback'=>true,'title'=>'Nouvel Utilisateur'])
    @endif
@endsection
@section('content')
    <div class="col-md-12">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="card-body rounded bg-white">
            @csrf
            @method("PATCH")
            <div class="row">
                @include('admin.users.form')
            </div>

            <div class="text-right">
                <hr>
                <button type="submit" class="btn btn-primary rounded">{{ __('dashboard.enregistrer') }}</button>
            </div>
        </form>
    </div>
@section('scriptBottom')
    <script>
        $(function(){
            $('body').on('click', '.enable', function() {
                var x = document.getElementById("password");
                if (x.disabled === false) {
                    x.disabled = true;
                    // x.type = "text";
                    document.getElementById("password-confirm").disabled = true;
                } else {
                    x.disabled = false;
                    // x.type = "password";
                    document.getElementById("password-confirm").disabled = false;
                }
            });
        })
    </script>
@endsection
@endsection
