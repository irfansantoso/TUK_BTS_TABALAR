<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_8 implements FromView
{    
    function __construct($tgl_laporan,$thn_produksi,$array) {
        $this->tgl_laporan = $tgl_laporan;
        $this->thn_produksi = $thn_produksi;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_rptRekapPerlokPertahun', [
            'tgl_laporan' => $this->tgl_laporan,
            'thn_produksi' => $this->thn_produksi,
            'arr1' => $this->arr1
        ]);        
    }
}
