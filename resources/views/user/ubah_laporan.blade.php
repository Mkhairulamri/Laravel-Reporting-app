@include('template/header')
@include('template/topside')
@include('template/side_user')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lapor Kerusakan</h1>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-header">
                  <h4>Form Lapor Kerusakan</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('simpan.update.laporan')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="section-title mt-0">Laporan Kerusakan</div>
                  @foreach ($data as $item)
                  <div class="form-group">
                    <label>Pilih Kategori</label>
                    <select class="custom-select" name="kategori" value="{{$item->kerusakan}}">
                      @foreach ($opsi as $value)
                          <option value="{{$value->id}}" name="kategori">{{ucwords($value->kategori_kerusakan)}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="section-title">Detail Laporan Kerusakan</div>
                  <div class="form-group">
                      <textarea class="form-control" placeholder="Detail Laporan Kerusakan" name="detail">{{$item->detail_kerusakan}}</textarea>
                    </div>

                  <div class="section-title">Lokasi Kerusakan</div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Lokasi Kerusakan" name="lokasi" value="{{$item->lokasi}}">
                    </div>
                  <div class="section-title">Upload Foto Keruskaan</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto[]" multiple>
                        <input type="hidden" name="foto_baru" value="{{$item->foto_kerusakan}}">
                        <label class="custom-file-label" for="customFile">Upload Foto</label>
                    </div>                  
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="id" value="{{$item->id}}">
                    @endforeach
                    <button class="btn btn-primary mr-1" type="submit">Submit Laporan</button>
                    <button class="btn btn-secondary" type="reset">Batal</button>
                  </div>
                </form>
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
