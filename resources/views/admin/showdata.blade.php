@include('template/header')
@include('template/topside')
@include('template/side')

      <!-- Isi Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pengguna</h1>
          </div>
          <div class="section-body">
            <!-- button tambah data -->
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>Tambah Data User
            </button>
            <h2 class="section-title">Tabel</h2>
            <p class="section-lead">Tabel Data Pengguna Yang Menggunakan Sistem Di Selingkungan UIN Suska Riau.</p>
            <div class="row">
              <div class="col-12">
                  <!-- Card Tabel -->
                <div class="card">
                  <div class="card-header">
                    <h4>Data Pengguna</h4>
                  </div>
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
                  <!-- Tabel -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <th>#</th>
                          <th style="width: 10%">Nama</th>
                          <th style="text-align:center" >Email</th>
                          <th style="text-align:center" >Unit Kerja</th>
                          <th style="text-align:center" >No HP</th>
                          <th style="text-align: center; width:20%">Pilihan</th>
                        </thead>
                        @php
                            $nomor =1;
                        @endphp
                        @foreach ($data as $da)
                        <tr>
                          <td>{{$nomor++}}</td>
                          <td>{{$da->name}}</td>
                          <td>{{$da->email}}</td>
                          <td>{{$da->unit_kerja}}</td>
                          <td>{{$da->no_hp}}</td>
                          <td style="text-align: center">
                            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reset Password" data-toggle="modal" data-target="#reset{{$da->id}}">
                              <i class="fas fa-redo-alt"></i>
                            </button>
                            <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Data" data-toggle="modal" data-target="#edit{{$da->id}}">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data" data-toggle="modal" data-target="#hapus_user{{$da->id}}">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                            
                            </td>
                        </tr> 
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </section>
      </div>


@include('template/footer')

<-- modal Input Data-->
<div class="modal fade col-12" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('simpan.user')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" required="" name="email">
                    <div class="invalid-feedback">
                      Maaf Email yang diinput Tidak Valid
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" required="" name="no_hp">
                    <div class="invalid-feedback">
                      Maaf No HP tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Unit Kerja</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="staf">
                      <option>Pilih Bagian</option>
                      <option value="Ma'had">Ma'had</option>
                      <option value="LPPM">LPPM</option>
                      <option value="PascaSarjana">PascaSarjana</option>
                      <option value="Perpustakaan">Perpustakaan</option>
                      <option value="PTIPD">PTIPD</option>
                      <option value="Pusat Bahasa">Pusat Bahasa</option>
                      <option value="Rektorat">Rektorat</option>
                      <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                      <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                      <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                      <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                      <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                      <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                      <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                      <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                    </select>
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

{{-- reset password User --}}
@foreach ($data as $item)
  <div class="modal fade col-12" tabindex="-1" role="dialog" id="reset{{$item->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Reset Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan Mereset Password <strong>{{ucfirst($item->name)}}</strong>?</p>
            </div>
            <div class="modal-footer">
              <a href="/admin/reset/{{$item->id}}">
                <button class="btn btn-primary">Reset</button>
              </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
  </div>
  @endforeach

  {{--Modal data Barang --}}
  @foreach ($data as $dt)
  <div class="modal fade col-12" tabindex="-1" role="dialog" id="hapus_user{{$dt->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hapus Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan Menghapus Data User <strong>{{ucfirst($dt->name)}}</strong>?</p>
            </div>
            <div class="modal-footer">
              <a href="/admin/hapus/{{$dt->id}}">
                <button class="btn btn-primary">Hapus Data</button>
              </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
  </div>
  @endforeach

{{-- modal edit data --}}
@foreach ($data as $user)
  <div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$user->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="/admin/edit/{{$user->id}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama" value="{{$user->name}}">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" required="" name="email" value="{{$user->email}}">
                    <div class="invalid-feedback">
                      Maaf Email yang diinput Tidak Valid
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" required="" name="no_hp" value="{{$user->no_hp}}">
                    <div class="invalid-feedback">
                      Maaf No HP Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Unit Kerja</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="staf">
                      @if ($user->unit_kerja == "Ma'had")
                        <option value="Ma'had" selected>Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif ($user->unit_kerja == "LPPM")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM" selected>LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan" >Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif ($user->unit_kerja == "PascaSarjana")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana" selected>PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif ($user->unit_kerja == "PTIPD")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan" >Perpustakaan</option>
                        <option value="PTIPD" selected>PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif ($user->unit_kerja == "Rektorat")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat" selected>Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif ($user->unit_kerja == "Perpustakaan")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan" selected>Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Ekonomi dan Ilmu Sosial")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial" selected>Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Ekonomi dan Ilmu Sosial")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial" selected>Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Dakwah dan Ilmu Komunikasi")
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi" selected>Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Psikologi"){{--psikologi --}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi" selected>Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>  
                      @elseif($user->unit_kerja == "Fakultas Pertanian dan Peternakan"){{--pertanian--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan" selected>Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Sains dan Teknologi"){{--fst--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi" selected>Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Syariah dan Ilmu Hukum"){{--fasih--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>  
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum" selected>Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Tarbiyah dan Keguruan"){{--tarbiyah--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan" selected>Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Fakultas Usuhuluddin") {{--ushuluddin--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>  
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin" selected>Fakultas Usuhuluddin</option>
                      @elseif($user->unit_kerja == "Pusat Bahasa") {{--pb--}}
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa" selected>Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>  
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                      @endif
                        <option value="Ma'had">Ma'had</option>
                        <option value="LPPM">LPPM</option>
                        <option value="PascaSarjana">PascaSarjana</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="PTIPD">PTIPD</option>
                        <option value="Pusat Bahasa">Pusat Bahasa</option>
                        <option value="Rektorat">Rektorat</option>
                        <option value="Fakultas Ekonomi dan Ilmu Sosial">Fakultas Ekonomi dan Ilmu Sosial</option>
                        <option value="Fakultas Dakwah dan Ilmu Komunikasi">Fakultas Dakwah dan Ilmu Komunikasi</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        <option value="Fakultas Pertanian dan Peternakan">Fakultas Pertanian dan Peternakan</option>
                        <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        <option value="Fakultas Syariah dan Ilmu Hukum">Fakultas Syariah dan Ilmu Hukum</option>
                        <option value="Fakultas Tarbiyah dan Keguruan">Fakultas Tarbiyah dan Keguruan</option>
                        <option value="Fakultas Usuhuluddin">Fakultas Usuhuluddin</option>
                    </select>
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
@endforeach

