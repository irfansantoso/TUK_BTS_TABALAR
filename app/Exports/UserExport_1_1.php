<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_1_1 implements FromView
{    
    function __construct($thn_produksi,$tgl_laporan_d,$tgl_laporan_s,$array) {
        $this->thn_produksi = $thn_produksi;
        $this->tgl_laporan_d = $tgl_laporan_d;
        $this->tgl_laporan_s = $tgl_laporan_s;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_stokPerThnDia', [
            'thn_produksi' => $this->thn_produksi,
            'tgl_laporan_d' => $this->tgl_laporan_d,
            'tgl_laporan_s' => $this->tgl_laporan_s,
            'arr1' => $this->arr1
        ]);        
    }
}
