<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    @php
      
      $tglPeriode = date("d-m-Y", strtotime($tgl_laporan));

    @endphp
    <h4 style="text-align:center;">STOK DI LOKASI {{ $nm_lok }}</h4>
    <h5 style="text-align:center;">PERIODE S/D {{ $tglPeriode }}</h5>
    <br>
    <table id="rptLogLoc" class="table table-bordered table-striped">
      <thead>
        <tr style="border-color: #000000;">
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Thn Prod</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Thn Rkt</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">No Btg</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Tgl Ukur</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Jns Kayu</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Chainsaw</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Traktor</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Helper</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Pjg</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Pkl</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Ujg</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Rt2</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Vol</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Cct</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Pcct</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Petak</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Kelas</th>
          <th style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Timbul</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = $arr1;
        @endphp

        @foreach ($getSelDt as $jsnx)
        <tr>              
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['thn_produksi_tpn'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['thn_rkt'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['no_btg'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['tgl_ukur'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['mk'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['mc'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['md'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['mh'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['pjg'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['pkl'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['ujg'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['rt2'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['vol'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['cct'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['pcct'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['petak'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['kelas'] }}</td>
          <td style="text-align:center;vertical-align: middle; border: 1px solid #000000;">{{ $jsnx['timbul'] }}</td>
        </tr>
        @endforeach             
      </tbody>         
    </table>
    <br>
  </div>
  <!-- /.card-body -->
</div>