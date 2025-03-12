<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" >
    
    <div>
      <table>
        <tr>
          <td colspan="11" align="center" style="font-size:20px;"><b>PT. BTS</b></td>
        </tr>
        <tr>
          <td colspan="11" align="center"><h5>Stock Log Tgl : {{ $tgl_laporan_d }} sampai {{ $tgl_laporan_s }}</h5></td>
        </tr>
        <tr>
          <td colspan="11" align="center"><h5>Tahun Produksi : {{ $thn_produksi }}</h5></td>
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
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERANTI BATU</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KERUING</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">BANGKIRAI</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;background-color: #f8b775;">PELEPEK</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') != 0)
          <td style="border: 1px solid #000000;background-color: #f8b775;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color: #f8b775;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">KAPUR</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">NYATOH</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">MERSAWA</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">RIMBA CAMPURAN</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>        
        <tr style="border: 1px solid #000000;background-color:#Dcdedb;">
          <td style="border: 1px solid #000000;background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif

          @if(App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') +
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>          
          <td style="border: 1px solid #000000;background-color:#f8ec84;">-</td>
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') +
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900') != 0)
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0100') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0101') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0200') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0300') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0301') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0400') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0500') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0600') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0600') + 
          App\Http\Controllers\UserController::getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'002','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'601','0900') + 
          App\Http\Controllers\UserController::getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi,'730','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;background-color:#Dcdedb;">-</td>
          @endif
        </tr>
      </tbody>
    </table>    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->