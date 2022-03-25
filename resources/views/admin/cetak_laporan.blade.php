<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pelaporan Kerusakan</title>
    <link rel="icon" href="{{asset('UIN_SULTAN_SYARIF_KASIM.png')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style media="screen">
    body{
      font-family: times-new-roman;
    }

    table{
      margin-left: 40px;
      margin-right: 30px;

    }
  .table {
    /* padding-top:10px; */
    font-size: 10pt;
    font-family: Arial, Helvetica, sans-serif;
    text-shadow: 1px 1px 0px #fff;
    margin-left: 40px;
    margin-right: 30px;
    border-collapse: collapse;
    table-layout: fixed;
    border: black 1px solid;
  }

  .table th {
    padding: 2px;
    text-align: center;
    border-left:1px solid black;
    border-bottom: 1px solid black;
    border-top: 1px solid black;
    border-right: 1px solid black;
    background: #ededed;
  }

  .table th:first-child{
  }

  /* .table tr {
    padding-top:30px;
    padding-bottom:10px;
  } */

  .table td:first-child {
    text-align: left;
    border-left: black 1px solid;
  }
  .table th{
    padding-top:10px;
    padding-bottom:10px;
  }

  .table td {
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    background: #fafafa;
     }

  .table tr:last-child td {
    border-bottom: 0;
  }

  .table tr:last-child td:first-child {
    -moz-border-radius-bottomleft: 3px;
    -webkit-border-bottom-left-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  .table tr:last-child td:last-child {
    -moz-border-radius-bottomright: 3px;
    -webkit-border-bottom-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }
 
  }
    </style>
  </head>
  <body>
    <h3 style="text-align:center;margin-top:30px">Laporan Kerusakan Bulanan Yang Telah Selesai</h3>
    <h4 style="text-align:center;margin-top:10px">Pada {{$bulan}} - {{$tahun}}</h4>
    @php
        $no =1;
    @endphp
    </table>
      <table class="table">
          <tr>
            <th style="width:5%">No</th>
            <th style="width:15%">Tanggal Laporan</th>
            <th style="width:15%">Gedung</th>
            <th style="width:15%">Unit Kerja</th>
            <th style="width:15%">Kerusakan</th>
            <th style="width:25%">Detail</th>
          </tr>
          @foreach ($data as $value)              
          <tr>
              <td>{{$no++}}</td>
              <td>{{$value->tanggal_laporan}}</td>
              <td>{{$value->lokasi}}</td>
              <td>{{$value->unit_kerja}}</td>
              <td>{{$value->kategori_kerusakan}}</td>
              <td>{{$value->detail_kerusakan}}</td>
          </tr>
          @endforeach

  </body>
  </html>
