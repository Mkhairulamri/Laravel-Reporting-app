
@include('template/header')
@include('template/topside')
@include('template/side')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kerusakan</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="card">
                <div class="card-header">
                  
                  <h4>Data Pelaporan Kerusakan</h4>
                  
                </div>
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
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Tanggal Laporan</th>
                            <th style="text-align: center">Kerusakan</th>
                            <th style="text-align: center">Detail</th>
                            <th style="text-align: center">Lokasi</th>
                            <th style="text-align: center">Pelapor</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center; width:250px">Pilihan</th>
                          </tr>
                        </thead>
                        @php
                            $no =1
                        @endphp
                        <tbody>
                          @foreach ($data as $datas)
                        <tr>
                          <td class="p-0 text-center" width="5%">{{$no++}}</td>
                          <td width="15%">{{$datas->tanggal_laporan }}</td>
                          <td class="align-middle"width="10%">{{ucwords($datas->kategori_kerusakan)}}</td>
                          <td width="25%">{{$datas->detail_kerusakan}}</td>
                          <td width="15%">{{$datas->lokasi}}</td>
                          <td width="10%">{{$datas->name}}</td>
                          <td style="text-align: center">
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
                          <td style="text-align: center" width="15%">
                            
                            @if ($datas->status === 0)
                            <a href="/admin/data-kerusakan/verifikasi/{{$datas->id}}">
                              <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Verifikasi Laporan">
                                <i class="far fa-check-square">Verifikasi</i>
                              </button>
                            @else
                            <a href="/admin/data-kerusakan/verifikasi/{{$datas->id}}">
                              <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Verifikasi Laporan">
                                <i class="fas fa-edit"></i>Ubah
                              </button>
                            @endif
                            </a>
                          </td>
                        </tr>
                        @endforeach   
                    </table>
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

@foreach ($data as $dt)
  <div class="modal fade col-lg" tabindex="10" role="dialog" id="verifikasi{{$dt->id}}">
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
