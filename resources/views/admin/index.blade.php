
@include('template/header')
@include('template/topside')
@include('template/side')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DashBoard Halaman Admin</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-8">

              </div>
              <div class="col-4">
                @if ($tahun == date('Y'))
                <a href="{{route('lalu')}}">
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Tampilkan Tahun Lalu
                </button>
                </a>
                    
                @endif
              </div>
            </div>
            <hr>
            <div id="container_grafik">
              
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var users =  <?php echo json_encode($data) ?>;
   
    Highcharts.chart('container_grafik', {
        title: {
            text: 'Jumlah Laporan Bulanan Tahun {{$tahun}}'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pelaporan Bulan Ini'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Laporan',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>