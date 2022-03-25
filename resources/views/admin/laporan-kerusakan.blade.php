
@include('template/header')
@include('template/topside')
@include('template/side')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan Kerusakan</h1>
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Laporan Kerusakan Yang Di Terima</h4>
                      <div class="card-header-form">
                          <div class="input-group">
                            <!-- button tambah data -->
                              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-file-alt"></i> Cetak Laporan
                            </button>
                          </div>
                      </div>
                    </div>
                    <div class="card-body p-0">
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
                              <td width="20%">{{$datas->detail_kerusakan}}</td>
                              <td width="15%">{{$datas->lokasi}}</td>
                              <td width="10%">{{$datas->name}}</td>
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


<-- modal Input Data-->
<div class="modal fade col-12" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Cetak Laporan Bulanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Pilih Waktu Untuk Cetak Laporan</strong>?</p>
          <form action="{{route('cetak.laporan')}}" method="POST" target="blank">
            @csrf
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bulan</label>
              <div class="col-sm-9">
                <select class="form-control" name="bulan">
                  <option>Pilih Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun</label>
              <div class="col-sm-9">
                <select class="form-control" name="Tahun">
                  <option>Pilih Tahun</option>
                  @for ($i=date('Y')-5;$i<=date("Y");$i++)
                    <option value="{{$i}}" name="tahun"><?=$i?></option>
                  @endfor
                </select>
              </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Cetak Laporan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>

