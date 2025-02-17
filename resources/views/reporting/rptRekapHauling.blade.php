@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptRekapHauling.rpt') }}" method="POST">
     @csrf        
    <div class="card-body">          
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Lokasi</label><br>
              <select class="form-control" name="lokasi" id="lokasi" style="width: 100%;">
                <option value="0" selected="selected">-Pilih-</option>
                <option value="002">TPN</option>
                <option value="601">TPK</option>
                <option value="730">LOGPOND</option>
                <option value="800">TONGKANG</option>
              </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Tanggal</label>
              <input type="text" class="form-control" name="tgl_laporan" id="reservation">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Jenis Laporan</label><br>
              <select class="form-control" name="jnsLap" id="jnsLap" style="width: 100%;">
                  <option value="xls">XLS</option>
                  <option value="view">VIEW</option>
              </select>
          </div>
        </div>
      </div>
    <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <button class="btn btn-success">Submit</button>
    </div>
    <!-- /.card-footer -->
  </form>              
</div>
  <!-- /.card -->

@if(session('lokasi') != "")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    @php
      $pieces = explode("-", session('tgl_laporan'));
      $startDt = $pieces[0];
      $endDt = $pieces[1];
      $strDt = date("d-m-Y", strtotime($startDt));
      $eDt = date("d-m-Y", strtotime($endDt));
      $tglPeriode = $strDt.' - '.$eDt;
    @endphp
    <h4 style="text-align:center;">REKAP HAULING KE {{ session('lokasi') }}</h4>
    <h6 style="text-align:center;">PERIODE {{ $tglPeriode }}</h6>
    <br>
    <table id="" class="table table-bordered">
      <thead>
        <tr style="border-color: #000000;">
          <th rowspan="3" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Jenis Kayu</th>
          <th colspan="6" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">KELAS DIAMETER</th>          
          <th rowspan="2" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>              
        </tr>
        <tr>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 40 - 49 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 50 - 59 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 60 Up )</th>
        </tr>
        <tr>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = Session::get('getSel'); 

          $sum_lowQty = 0;
          $sum_lowVol = 0;
          $sum_middleQty = 0;
          $sum_middleVol = 0;
          $sum_highQty = 0;
          $sum_highVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td style="border: 1px solid #000000;">{{ $jsnx['namakayu'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lowQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lowVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['middleQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['middleVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['highQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['highVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalVol'] }}</td>
        </tr>
        @php
          $sum_lowQty += $jsnx['lowQty'];
          $sum_lowVol += $jsnx['lowVol'];
          $sum_middleQty += $jsnx['middleQty'];
          $sum_middleVol += $jsnx['middleVol'];
          $sum_highQty += $jsnx['highQty'];
          $sum_highVol += $jsnx['highVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot>          
    </table>
    <br>    
    <i>Notes : Data ini termasuk data yang sudah ditongkang.</i>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection