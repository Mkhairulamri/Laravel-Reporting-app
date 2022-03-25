
@include('template/header')
@include('template/topside')
@include('template/side')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kategori Kerusakan</h1>
          </div>
          <div class="section-body">
            {{-- Button Tambah Kategori --}}
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah_kategori">
                <i class="fas fa-plus"></i>Tambah Kategori Kerusakan
            </button>
            <h2 class="section-title">Tabel</h2>
            <p class="section-lead">Tabel Kategori Kerusakan.</p>
            <div class="row">
            <div class="col-md-12">
                {{-- alert berhasil dan gagal --}}
                @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{$message}}
                  </div>
                </div>
                @endif
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{$massage}}
                  </div>
                </div>
                @endif
                @if ($message = Session::get('hapus_sukses'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{$message}}
                  </div>
                </div>
                @endif
                @if ($message = Session::get('hapus_gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{$massage}}
                  </div>
                </div>
                @endif
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>No</th>
                          <th style="text-align:center">Jenis Kerusakan</th>
                          <th style="text-align:center">Jumlah Pelaporan</th>
                          <th style="text-align:center" width="10%">Laporan Diterima</th>
                          <th style="text-align:center" width="10%">Laporan Ditolak</th>
                          <th style="text-align:center" width="10%">Laporan Belum Diverifikasi</th>
                          <th style="text-align:center" width="20%">Verifikasi Laporan</th>
                        </tr>
                        @foreach ($value as $key => $v)

                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ ucfirst($v['kategori']->kategori_kerusakan) }}</td>
                              <td>{{ $v['jumlah'] }}</td>
                              <td style="text-align: center"><div class="badge badge-success">{{$v['diterima']}}</div></td>
                              <td style="text-align: center"><div class="badge badge-danger">{{$v['ditolak']}}</div></td>
                              <td style="text-align: center"><div class="badge badge-warning">{{$v['diverifikasi']}}</div></td>
                              <td width="15%" style="text-align: center">
                                {{-- pilihan --}}
                                <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Data" data-toggle="modal" data-target="#edit{{$v['id']}}">
                                  <i class="fas fa-edit">Edit</i>
                                </button>
                                @if($v['jumlah'] >= 1)
                                  <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kategori Tidak Bisa Di Hapus" disabled>
                                    <i class="fas fa-trash-alt">Hapus</i>
                                  </button>
                                @else($v['jumlah' == 0])
                                  <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data" data-toggle="modal" data-target="#hapus{{$v['id']}}">
                                    <i class="fas fa-trash-alt">Hapus</i>
                                </button>
                                @endif
                                
                            </td>
                            </tr>
                        @endforeach                        
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
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

{{-- modal Tambah Kategori --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="tambah_kategori">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Kategori Kerusakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('simpan.kategori')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Kategori</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
              </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal hapus --}}
@foreach ($value as $key => $v)
  <div class="modal fade col-12" tabindex="-1" role="dialog" id="hapus{{$v['id']}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hapus Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan Mereset Menghapus Kategori <strong>{{ucfirst($v['kategori']->kategori_kerusakan)}}</strong>?</p>
            </div>
            <div class="modal-footer">
              <a href="/admin/kategori/hapus/{{$v['id']}}">
                <button class="btn btn-primary">Hapus</button>
              </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
  </div>

  <div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$v['id']}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Kategori Kerusakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('update.kategori')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Kategori</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama" value="{{ucfirst($v['kategori']->kategori_kerusakan)}}">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                  <input type="hidden" value="{{$v['id']}}" name="id">
                </div>
              </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach