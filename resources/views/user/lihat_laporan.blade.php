@include('template/header') @include('template/topside') @include('template/side_user')
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Lihat Detail Laporan Kerusakan</h1>
		</div>@foreach ($data as $item)
		<div class="section-body">
			<div class="row">
				<div class="col-12 col-md-7 col-lg-7">
					<div class="card">
						<div class="card-header">
							<h4>Foto Kerusakan</h4>
                            @php 
                            $foto = json_decode($item->foto_kerusakan); 
                            @endphp</div>
						<div class="card-body">
							<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="/images/{{$foto[0]}}" alt="Foto Kerusakan">
                                    </div>
                                    @foreach ($foto as $img)
									<div class="carousel-item">
										<img class="d-block w-100" src="/images/{{$img}}" alt="Foto Kerusakan">
                                    </div>
                                    @endforeach</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-5 col-lg-5">
					<div class="card">
						<div class="card-header">
							<h4>Data Kerusakan</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Tanggal Kerusakan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-calendar-alt"></i>
										</div>
									</div>
									<input type="text" class="form-control" value="{{$item->tanggal_laporan}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Kategori Kerusakan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-tags"></i>
										</div>
									</div>
									<input type="text" class="form-control" value="{{$item->kategori_kerusakan}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Detail Kerusakan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-info-circle"></i>
										</div>
									</div>
									<input type="textarea" class="form-control phone-number" value="{{$item->detail_kerusakan}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Lokasi Kerusakan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
										</div>
									</div>
									<input type="text" class="form-control phone-number" value="{{$item->lokasi}}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label>Petugas Yang Melaporkan Kerusakan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-user"></i>
										</div>
									</div>
									<input type="text" class="form-control" value="{{$item->name}}" readonly>
								</div>
							</div>
						</div>
						<div class="card-footer text-right"></div>
					</div>
				</div>
            </div>
            @endforeach
        </section>
	</div>
	<footer class="main-footer ">
		<div class="footer-left">Copyright &copy; 2020
			<div class="bullet"></div>UIN Suska Riau</div>
	</footer>@include('template/footer') 