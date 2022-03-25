@include('template/header')
@include('template/topside')
@include('template/side_user')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DashBoard Halaman User</h1>
          </div>

          <div class="section-body">
              <h2>Selamat Datang Kepada {{$user = Auth::user()->name}}</h2>
              <h4>Dari Unit Kerja {{$user = Auth::user()->unit_kerja}}</h4>
              <p>Di Sistem Pelaporan Kerusakan Listrik dan Gedung UIN SUSKA RIAU</p>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> UIN Suska Riau 
        </div>
      </footer>
    </div>
  </div>
     
@include('template/footer')
