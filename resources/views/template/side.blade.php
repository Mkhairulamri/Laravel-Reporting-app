<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#"> <img src="{{asset('UIN_SULTAN_SYARIF_KASIM.png')}}" style="width: 10%;">Pelaporan Kerusakan</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">PK</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Beranda</li>
          <li class="nav-item
          @if($menu == 1)
            active
          @endif">
            <a href="{{route('admin')}}" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
            
          </li>
          <li class="menu-header">Pengguna</li>
          <li class="nav-item
          @if($menu == 2)
            active
          @endif">
            <a href="/admin/profil" class="nav-link"><i class="fas fa-user"></i> <span>Profil</span></a>
          </li>
          <li class="nav-item
          @if($menu == 3)
            active
          @endif">
            <a href="/admin/user" class="nav-link"><i class="fas fa-users"></i> <span>Pengguna</span></a>
          </li>
          
          <li class="menu-header">Pelaporan Kerusakan</li>
          <li class="nav-item
          @if($menu == 4)
            active
          @endif">
            <a href="/admin/kategori-kerusakan" class="nav-link"><i class="fas fa-th-large"></i> <span>Kategori Kerusakan</span></a>
            </li>
            <li class="nav-item
            @if($menu == 5)
              active
            @endif">
            <a href="/admin/data-kerusakan" class="nav-link"><i class="fas fa-table"></i> <span>Data Kerusakan</span></a>
          </li>
          <li class="nav-item
          @if($menu == 6)
            active
          @endif">
            <a href="/admin/laporan-kerusakan" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan Kerusakan</span></a>
            </li>
          
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="{{route('logout')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
    </aside>
  </div>