<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img src="{{asset('UIN_SULTAN_SYARIF_KASIM.png')}}" style="width: 10%;">Pelaporan Kerusakan</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Beranda</li>
          <li class="nav-item
          @if($menu == 1)
            active
          @endif">
            <a href="/user/index" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
          </li>
          <li class="menu-header">Pengguna</li>
          <li class="nav-item
          @if($menu == 2)
            active
          @endif">
            <a href="/user/profil" class="nav-link"><i class="fas fa-user"></i> <span>Profil</span></a>
          </li>
          
          <li class="menu-header">Pelaporan Kerusakan</li>
          <li class="nav-item
          @if($menu == 3)
            active
          @endif">
            <a href="/user/lapor-kerusakan" class="nav-link"><i class="fas fa-th-large"></i> <span>Lapor Kerusakan</span></a>
            </li>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="{{route('logout')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
    </aside>
  </div>