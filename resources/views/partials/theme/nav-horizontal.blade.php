<nav class="navbar navbar-expand-lg navbar-light m-4 rounded mt-4 pl-4 pr-4">
    <a class="navbar-brand h1" href="#"><img src="{{ asset('img/logo.png') }}" width="150px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#home">{{ __('home.menu1') }} <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#presentation">{{ __('home.menu2') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#mission">{{ __('home.menu3') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#team">{{ __('home.menu4') }}</a>
        </li>
        <li class="nav-item pt-2">
            @include('langue')
        </li>
      

      </ul>
      <div class="form-inline my-2 my-lg-0">
            <a href="#contact" class="btn btn-shadow btn-sm border-radius btn-primary my-2 my-sm-0 rounded-4 pl-4 pr-4" type="submit">{{ __('home.contact') }}</a href="#contact">
      </div>
    </div>
  </nav>
