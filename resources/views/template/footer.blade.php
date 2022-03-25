<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/node_modules/prismjs/prism.js')}}"></script>
<script src="{{asset('assets/node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{asset('assets/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>


<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/js/page/modules-datatables.js"></script>
<script src="../assets/js/page/bootstrap-modal.js"></script>
<script src="{{asset('assets/js/page/modules-sweetalert.js')}}"></script>

<script src="https://demo.getstisla.com/assets/modules/datatables/datatables.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script>
    $("#table-2").dataTable({
        "columnDefs": [{
            "sortable": false,
            "targets": []
        }]
    });
</script>
{{-- <script>
    $("#datapeminjaman").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": []},
            {"width" : "2%", "targets" : [0]},
            {"width" : "13%", "targets" : [1]},
            {"width" : "13%", "targets" : [2]},
            {"width" : "13%", "targets" : [3]},
            {"width" : "13%", "targets" : [4,5]},
            {"width" : "8%", "targets" : [6]},
            {"width" : "20%", "targets" : [7]}
        ]
    });
</script> --}}
