@include('template/header')

    <!-- Isi Content -->
    <div id="app">
        <section class="section">
          <div class="container mt-3">
            <div class="row">
              <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                  <img src="{{asset('UIN_SULTAN_SYARIF_KASIM.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                  <h3 class="mt-2">Sistem Pelaporan Kerusakan</h2>
                </div>
    
                <div class="card card-primary">
                  <div class="card-header"><h4>Reset Passwors</h4></div>
    
                  <div class="card-body">
                    <form method="POST" action="#" class="needs-validation" novalidate="">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                          Tolong Masukkan Email Yang Valid
                        </div>
                      </div>
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Reset Password
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="simple-footer">
                   Bagian Umum &copy; UIN Suska Riau 2020
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@include('template/footer')

