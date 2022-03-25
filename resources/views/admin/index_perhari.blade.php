
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
                <a href="">
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Tampilkan Pertanggal
                </button>
                </a>
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
   
    users.forEach(myFunction)

    function myFunction(item, index, arr){
      console.log(arr[index])
    }

    Highcharts.chart('container_grafik', {
        title: {
            text: 'Jumlah Laporan Bulanan Tahun {{date('Y')-1}}'
        },
         xAxis: {
            categories: ['oktober', 'november','desember']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pelaporan Tanggal Ini'
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