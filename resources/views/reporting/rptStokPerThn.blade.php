@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptStokPerThn.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-1">
          <div class="form-group">
            <label>HPH</label><br>
              <select class="form-control" name="hph" id="hph" style="width: 100%;">
                <option value="MIM">MIM</option>
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Dari</label>
              <input type="text" class="form-control" name="tgl_laporan_d" data-inputmask-alias="datetime" value="{{ session('tgl_laporan_d') ?? '' }}" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Sampai</label>
              <input type="text" class="form-control" name="tgl_laporan_s" data-inputmask-alias="datetime" value="{{ session('tgl_laporan_s') ?? '' }}" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group">
            <label>Th Prod</label><br>
              <input type="text" class="form-control" name="thn_produksi" data-inputmask-alias="datetime" value="{{ session('thn_produksi') ?? '' }}" data-inputmask-inputformat="yyyy" data-mask>
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

@if(session('hph') != "")
<?php
  $stDt = date("d-m-Y", strtotime(session('tgl_laporan_d')));
  $etDt = date("d-m-Y", strtotime(session('tgl_laporan_s')));
?>
<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BTS</h2>
    <h6>Stock Log Tgl : {{ $stDt }} sampai {{ $etDt }}</h6>
    <h6>Tahun Produksi : {{ session('thn_produksi') }}</h6>
    <table id="mim" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LOGPOND</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th style="background-color:#f8ec84;">Btg</th>
          <th style="background-color:#f8ec84;">M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>MERANTI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td>KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>        
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') +  
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn(session('hph'),session('tgl_laporan_d'),session('tgl_laporan_s'),session('thn_produksi'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
    
</div>
<!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection