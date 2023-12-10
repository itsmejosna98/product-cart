<!-- partial:../../partials/_navbar.html -->
<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('../../assets/images/logo-mini.svg')}}" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="{{asset('../../assets/images/faces/face15.jpg')}}" alt="">
            @if(Auth::check())
            <p class="mb-0 d-none d-sm-block navbar-profile-name">Josna Thomas</p>
            @else
            <p class="mb-0 d-none d-sm-block navbar-profile-name">Guest</p>
            @endif
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <h6 class="p-3 mb-0">Profile</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-logout text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
            @if(Auth::check())
            <a style="margin-left: 53px;margin-top:-72px;" class="dropdown-item" href="{{url('logout')}}"><span>Log Out</span></a>
            @else
            <a style="margin-left: 53px;margin-top:-72px;" class="dropdown-item" href="{{url('logout')}}"><span>Log In</span></a>
            @endif
            </div>
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
</nav>
</div>