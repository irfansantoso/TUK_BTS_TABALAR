@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptRekapTkg.rpt') }}" method="POST">
     @csrf        
    <div class="card-body">          
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Nama Tongkang</label>
              <select class="form-control select2" name="muatUnit" id="muatUnit" style="width: 100%;">
                <option value="" selected="selected">-- Tongkang --</option>
                @foreach ($unitAlat as $drv)
                  <option value="{{ $drv->kode_unit_a }}">{{ $drv->nomor_pintu }}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Tgl Periode</label>
              <input type="text" class="form-control" name="tgl_laporan" id="reservation" required>
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group">
            <label>Th Prod</label><br>
              <input type="text" class="form-control" name="thn_produksi_start" data-inputmask-alias="datetime" value="{{ session('thn_prod_s') ?? '' }}" data-inputmask-inputformat="yyyy" data-mask required>
          </div>
        </div>
        <div class="">
          <div class="form-group">
            <label>&nbsp;</label><br>
              <label>S/D</label>
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group">
            <label>Th Prod</label><br>
              <input type="text" class="form-control" name="thn_produksi_end" data-inputmask-alias="datetime" value="{{ session('thn_prod_e') ?? '' }}" data-inputmask-inputformat="yyyy" data-mask required>
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

@if(session('muatUnit') != "")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    @php
      $tglPerAwal = date("d-m-Y", strtotime(session('strDt')));
      $tglPerAkh = date("d-m-Y", strtotime(session('eDt')));
    @endphp
    <h4 style="text-align:center;">REKAP PENERIMAAN TONGKANG</h4>
    <h6 style="text-align:center;">TAHUN PRODUKSI : {{ session('thn_prod_s') }} S/D {{ session('thn_prod_e') }}</h6>
    <h6 style="text-align:center;">PERIODE : {{ $tglPerAwal }} S/D {{ $tglPerAkh }}</h6>
    <h6 style="text-align:center;">TONGKANG : {{ session('namaTkg') }}</h6>
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
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection