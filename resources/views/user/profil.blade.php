
@include('template/header')
@include('template/topside')
@include('template/side_user')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profil</h1>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Profil User</h4>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" value="{{$user = Auth::user()->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" value="{{$user = Auth::user()->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-phone"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control phone-number" value="{{$user = Auth::user()->no_hp}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Unit kerja</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control phone-number" value="{{$user = Auth::user()->unit_kerja}}" readonly>
                        </div>
                      </div>
                    </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" data-toggle="modal" data-target="#update">Update Profil</button>
                    
                  </div>
              </div>
                    </div>
                </div>
            </div>
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

{{-- update profil --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="update">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Profil User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('update.profil.user')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama" value="{{$user = Auth::user()->name}}">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" required="" name="email" value="{{$user = Auth::user()->email}}"> 
                    <div class="invalid-feedback">
                      Maaf Email yang diinput Tidak Valid
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" required="" name="no_hp" value="{{$user = Auth::user()->no_hp}}">
                    <div class="invalid-feedback">
                      Maaf No HP tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password">
                      <small class="form-text text-muted">Password Baru(Boleh Kosong).</small>
                    </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>