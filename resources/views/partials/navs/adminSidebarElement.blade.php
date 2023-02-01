@php
    $full_url = url()->current();
    $url_path = '/' . request()->path();
    $explode_path = explode('/', $url_path);
    $ref = isset($explode_path[2]) ? $explode_path[2] : null;
    
@endphp

<style>
    .nav-link {
        margin: 5px 0 !important;
    }

    ul.stats {
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }

    .stats__icon {
        padding: 0 9px 0 19px !important;
    }

    .brand-link>img.mini-logo {
        display: none;
    }

    @media only screen and (max-width: 990px) {
        .brand-link>img.large-logo {
            display: none;
        }

        .brand-link>img.mini-logo {
            display: block;
            width: 50px;
            height: 50px;
            margin-top: -10px;
        }
    }

    @media (max-width: 990px) {
        .main-sidebar:hover>.brand-link>img.large-logo {
            display: block;
        }

        .main-sidebar:hover>.brand-link>img.mini-logo {
            display: none;
        }
    }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar text-sm bg-blue elevation-0" style="z-index: 10000">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-none d-sm-block mt-0" style="justify-content: center;display: flex !important">
        <img src="{{ asset('img/logo.jpg') }}" alt="Mairie" class="brand-image large-logo rounded">
        <span>Marine Bleu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-blue" style="padding-top:30px !important">
        <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel bg-primary py-2 d-flex align-items-center px-2 border-0">
            <div class="image">
                <i class="fas fa-user-circle fa-2x"></i>
            </div>
            <div class="info">
                <a href="{{ route('compte') }}" class="text-white brand-text font-weight-light small font-weight-bolder">
                    <?= $_user->nom_complet ?> <br>
                    <span class="badge badge-dark small"><?= $_user->profilName ?></span>
                </a>
            </div>
        </div> --}}
        {{-- <hr class="my-0 bg-primary">

        <hr class="my-0"> --}}

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline px-2 shadow-sm pb-2">
            <div class="input-group my-1" data-widget="sidebar-search">
                <a class="nav-item  btn btn-warning col-md-12 text-left pl-3">
                    <i class="fa fa-plus-circle"></i>
                    Nouveau document
                </a>
            </div>
        </div> --}}
        {{-- <nav class="mt-2 sidebar-nav" style="height: auto">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('documents.create') }}" class="nav-link btn-warning" style="color: white;background: #dc3545;font-weight: 900;">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>
                            Nouvelle demande
                        </p>
                    </a>
                </li>
            </ul>
        </nav> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-1 sidebar-nav p-0">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (isset($_sidebar))
                    @foreach ($_sidebar->principals as $key => $header)
                        @php
                            $url_principal = isset($header->url) ? url($header->url) : (isset($header->route) ? route($header->route) : '#');
                        @endphp
                        <li class="nav-item ">
                            <a href="{{ $url_principal }}"
                                class="nav-link {{ $url_principal == $full_url ? 'active' : '' }}">
                                <i class="nav-icon fas {{ $header->fa }}"></i>
                                <p>
                                    <?= $header->name ?>
                                    @if (isset($header->variableCount))
                                        <span
                                            class="badge badge-primary right">{{ "${$header->variableCount}" ?? 0 }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        <hr class="sidebar-divider my-0">
                    @endforeach
                    @foreach ($_sidebar->secondaires as $key => $second)
                        @if (isset($second->items) && count($second->items) > 0)
                            <li
                                class="nav-item  {{ isset($second->refs) && in_array($ref, $second->refs) ? ' menu-open' : '' }} {{ isset($second->li) ? $second->li : '' }} ">
                                <a href="#"
                                    class="nav-link{{ isset($second->refs) && in_array($ref, $second->refs) ? ' active' : '' }}">
                                    <i class="nav-icon fas {{ $second->fa }}"></i>
                                    <p>
                                        {{ $second->name }}
                                        <i class="right fas fa-angle-left"></i>
                                        @if (isset($second->variableCount))
                                            <span
                                                class="badge badge-primary right">{{ "${$second->variableCount}" ?? 0 }}</span>
                                        @endif
                                    </p>
                                </a>
                                <ul class="nav nav-treeview shadow-sm">
                                    @if (isset($second->items) && count($second->items) > 0)
                                        @foreach ($second->items as $item)
                                            @php
                                                $itemUrl = isset($item->url) ? url($item->url, $item->params ?? []) : (isset($item->route) ? route($item->route, $item->params ?? []) : '#');
                                            @endphp
                                            <li class="nav-item ">
                                                <a href="{{ $itemUrl }}"
                                                    class="nav-link{{ $itemUrl == $full_url ? ' active' : '' }} ">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        {{ $item->name }}
                                                        @if (isset($item->variableCount))
                                                            <span
                                                                class="badge badge-primary right p-0">{{ "${$item->variableCount}" ?? 0 }}</span>
                                                        @endif
                                                    </p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            @else
                                @php
                                    $url_secondaire = isset($second->url) ? url($second->url) : (isset($second->route) ? route($second->route) : '#');
                                @endphp
                            <li class="nav-item ">
                                <a href="{{ $url_secondaire }}"
                                    class="nav-link {{ $url_secondaire == $full_url ? 'active' : '' }}">
                                    <i class="nav-icon fas {{ $second->fa }}"></i>
                                    <p>
                                        {{ $second->name }}
                                        @if (isset($second->variableCount))
                                            <span
                                                class="badge badge-light text-primary right">{{ "${$second->variableCount}" ?? 0 }}</span>
                                        @endif
                                    </p>
                                </a>
                        @endif
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column stats mt-2 text-center" data-widget="treeview"
                role="menu" data-accordion="false"
                style="position: absolute;
            bottom: 100px;background:transparent">
                <li class="nav-link" style="background: none !important;">
                    <a class="text-white" href="{{ route('logout') }}" style="color: #fff !important"
                        onclick="event.preventDefault();
                    if(confirm('Voulez-vous vraiment vous déconnecter')){
                        document.getElementById('logout-form').submit();
                                                            }">
                        <hr class="bg-white">
                        <i class="fa fa-sign-out-alt text-white mr-2"></i>
                        <p class="text-white">{{ __('dashboard.deconnexion') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                        @csrf
                    </form>
                </li>
            </ul>
    </div>
</aside>
