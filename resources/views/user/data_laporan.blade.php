
@include('template/header')
@include('template/topside')
@include('template/side_user')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kerusakan</h1>
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
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
                    <div class="card-header">
                      <h4>Data Pelaporan Kerusakan</h4>
                      <div class="card-header-form">
                        <a href="{{route('form-laporan')}}">
                            <button class="btn btn-primary float-right">
                                <i class="fas fa-plus"></i>Laporkan Kerusakan
                            </button>    
                        </a>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped">
                            @php
                                $no=1
                            @endphp
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center" >Tanggal Laporan</th>
                            <th style="text-align: center" width="10%">Kerusakan</th>
                            <th style="text-align: center">Detail</th>
                            <th style="text-align: center">Lokasi</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center" width="20%">Pilihan</th>
                          </tr>
                          @foreach ($data as $datas)
                          <tr>
                            <td class="p-0 text-center">{{$no++}}</td>
                            <td width="15%">{{$datas->tanggal_laporan }}</td>
                            <td class="align-middle" width="7%">{{ucwords($datas->kategori_kerusakan)}}</td>
                            <td width="15%">{{$datas->detail_kerusakan}}</td>
                            <td width="15%">{{$datas->lokasi}}</td>
                            <td width="8%">
                              @if($datas->status === 0)
                              <div class="badge badge-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Laporan Belum Diverifikasi"><i class="fas fa-question-circle"> Belum Diverifikasi</i></div>
                          @elseif($datas->status===1)
                              <div class="badge badge-info"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Laporan Diterima dan Sedang Proses Perbaikan"><i class="fas fa-hammer"></i> Sedang Diproses</div>
                          @elseif($datas->status === 2)
                              <div class="badge badge-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Laporan Ditolak"><i class="fas fa-times-circle"></i> Laporan Ditolak</div>
                          @elseif($datas->status === 3)
                              <div class="badge badge-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proses Perbaikan Telah Selesai"><i class="fas fa-check-circle"></i> Laporan Selesai</div>
                          @endif
                                </td>
                            <td style="text-align: center"  width="20%">
                              <a href="/user/laporan/lihat/{{$datas->id}}">
                                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Laporan">
                                  <i class="fas fa-eye"></i>
                                </button>
                              </a>
                              @if ($datas->status === 0)
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data" data-toggle="modal" data-target="#hapus{{$datas->id}}">
                                  <i class="fas fa-trash-alt"></i>
                                </button> 
                                <a href="laporan/ubah/{{$datas->id}}">
                                  <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Laporan">
                                    <i class="fas fa-edit"></i>
                                  </button>
                                </a>
                              @else
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Data Tidak Bisa Di Hapus Lagi" disabled>
                                  <i class="fas fa-trash-alt"></i>
                                </button> 
                                <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Data Yang Sudah Diverifikasi Tidak Bisa Diubah" disabled>                                 
                                  <i class="fas fa-edit"></i>
                                </button>
                              @endif
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
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> UIN Suska Riau 
        </div>
      </footer>
    </div>
  </div>
@include('template/footer')

@foreach ($data as $key)
  <div class="modal fade col-12" tabindex="-1" role="dialog" id="hapus{{$key->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hapus Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan Menghapus Laporan?</p>
            </div>
            <div class="modal-footer">
              <a href="/user/data-laporan/hapus/{{$key->id}}">
                <button class="btn btn-primary">Hapus</button>
              </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
  </div>
  @endforeach