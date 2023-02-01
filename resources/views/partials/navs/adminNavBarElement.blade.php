  <style>
      .navbar{
        padding: 3px !important;
      }
  </style>
  <!-- Navbar -->
  <nav class="main-header navbar text-sm navbar-expand">
    <!-- Left navbar links -->
    <div class="site_info">
        <h1 class="h3 ml-2 font-weight-bold m-0 text-dark d-flex align-items-center">
          <span class="d-lg-none d-md-none mr-1"><img src="{{ asset('img/logo.jpg') }}" alt="Logo" height="29" class="brand-image mr-2"> | Marine bleu</span>
          {{-- {{ env('APP_NAME', "Orbus Connector") }} --}}
          @if(Auth::user())
              @if($_user->role && $_user->role->profil_id == 3)
                {{ $_user->universite->name }}
              @endif
          @endif
          {{-- <a href="{{url('/')}}" class="btn btn-outline-primary py-0 font-weight-bold">{{$_user->entreprise ? $_user->entreprise->name : '---'}}</a> --}}
        </h1>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown d-none">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-info-circle"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="p-3 text-danger text-center">
            Aucune nouvelle !
          </div>
          {{-- <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> --}}
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown d-none">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="p-3 text-danger text-center">
            Aucune notification !
          </div>
          {{-- <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> --}}
      </li>
      <li class="nav-item mt-1" title="Mon compte">
            <a href="#" class="text-white brand-text font-weight-light small font-weight-bolder mr-2 d-flex justify-content-center align-items-center">
                <i class="fas fa-user-circle fa-3x text-primary"></i>
                <div>

                    @if (isset($_user) && !$_user->is_admin && in_array($_user->role->profil_id,[2]))
                    <span class="text-dark ml-2"><?= $_user->eleve->nom_complet ?></span>
                    @endif
                    <span class="text-success" style="justify-content: center;display: flex">
                        <?= $_user->profilName ?>
                    </span>
                </div>
                 <br>
            </a>
        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            if(confirm('Voulez-vous vraiment deconnecter votre session')){
                document.getElementById('logout-form').submit();
            };"
        >
          <i class="fas fa-sign-out-alt text-primary"></i>
        </a> --}}
      </li>
      <li class="nav-item d-lg-none d-md-none">
        <a class="nav-link text-primary" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
