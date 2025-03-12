<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" >
    
    <div>
      <table>
        <tr>
          <td colspan="11" align="center" style="font-size:20px;"><b>PT. BTS</b></td>
        </tr>
        <tr>
          <td colspan="11" align="center"><h5>Stock Log Per Tgl : {{ $tgl_laporan }}</h5></td>
        </tr>
      </table>
    </div>   
    <table id="tb2" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">LOGPOND</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 1px solid #000000;">MERANTI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
                    
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
                    
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>        
        <tr style="border: 1px solid #000000;background-color:#Dcdedb;">
          <td style="border: 1px solid #000000;background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0100') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
        </tr>
      </tbody>
    </table>

    <div>
      <table>
        <tr>
          <td colspan="11" align="center" style="font-size:20px;"><b>PT. BTS</b></td>
        </tr>
        <tr>
          <td colspan="11" align="center"><h5>Stock Log Per Tgl : {{ $tgl_laporan }}</h5></td>
        </tr>
      </table>
    </div>    
    <table id="tb3" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TPN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK</th>      
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">LOGPOND</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#f8ec84;border: 1px solid #000000;">TONGKANG</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>      
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#f8ec84;border: 1px solid #000000;">M3</th> 
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#Dcdedb;border: 1px solid #000000;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = $arr1; 

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
            <td style="border: 1px solid #000000;">Total Kayu {{ $jsnx['thnprod'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpn2Qty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpn2Vol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpk57Qty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tpk57Vol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lkdQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lkdVol'] }}</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalVol'] }}</td>
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
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Grand Total</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpn2Qty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpn2Vol }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpk57Qty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpk57Vol }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lkdQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_lkdVol }}</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #f8ec84;border: 1px solid #000000;">-</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->