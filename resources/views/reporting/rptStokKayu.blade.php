@extends('template')
@section('content')
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptStokKayu.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>HPH</label><br>
              <select class="form-control" name="hph" id="hph" style="width: 100%;">
                <option value="MIM">MIM</option>
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal</label>
              <input type="text" class="form-control" name="tgl_laporan" data-inputmask-alias="datetime" value="{{ session('tgl_laporan') ?? '' }}" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
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
<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BTJ</h2>
    <h6>Stock Log Per Tgl : {{ session('tgl_laporan') }}</h6>
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
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
         
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') != 0)
          <td style="background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301'); }}</td>
          @else
          <td style="background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td>KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>          
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>        
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td style="background-color:#66e31e;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td style="background-color:#acf283;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td style="background-color:#66e31e;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') != 0)
          <td style="background-color:#acf283;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900'); }}</td>
          @else
          <td>-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td style="background-color:#66e31e;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td style="background-color:#acf283;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          <td style="background-color:#f8ec84;">-</td>
          <td style="background-color:#f8ec84;">-</td>

          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') +  
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'730','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BTJ</h2>
    <h6>Stock Log Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="mim2" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LOGPOND</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;">TONGKANG</th>
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
        @php 
          $getSelDt = Session::get('getSel'); 

          $sum_tpn2Qty = 0;
          $sum_tpn2Vol = 0;
          $sum_tpk57Qty = 0;
          $sum_tpk57Vol = 0;
          $sum_lkdQty = 0;
          $sum_lkdVol = 0;
          $sum_tongQty = 0;
          $sum_tongVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td>Total Kayu {{ $jsnx['thnprod'] }}</td>
            <td>{{ $jsnx['tpn2Qty'] }}</td>
            <td>{{ $jsnx['tpn2Vol'] }}</td>
            <td>{{ $jsnx['tpk57Qty'] }}</td>
            <td>{{ $jsnx['tpk57Vol'] }}</td>
            <td>{{ $jsnx['lkdQty'] }}</td>
            <td>{{ $jsnx['lkdVol'] }}</td>
            <td style="background-color:#f8ec84;">-</td>
            <td style="background-color:#f8ec84;">-</td>
            <td>{{ $jsnx['totalQty'] }}</td>
            <td>{{ $jsnx['totalVol'] }}</td>
        </tr>
        @php
          $sum_tpn2Qty += $jsnx['tpn2Qty'];
          $sum_tpn2Vol += $jsnx['tpn2Vol'];
          $sum_tpk57Qty += $jsnx['tpk57Qty'];
          $sum_tpk57Vol += $jsnx['tpk57Vol'];
          $sum_lkdQty += $jsnx['lkdQty'];
          $sum_lkdVol += $jsnx['lkdVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color:#C0c1c0;">Grand Total</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpn2Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpn2Vol }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpk57Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpk57Vol }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lkdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_lkdVol }}</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #f8ec84;">-</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->  
</div>
<!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection