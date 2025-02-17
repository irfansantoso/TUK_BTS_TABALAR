<?php

namespace App\Exports;

use App\Models\TrHeaderTpn;
use App\Models\TrDetailTpn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_1 implements FromView
{    
    function __construct($hph,$tgl_laporan_d,$tgl_laporan_s,$thn_produksi) {
        $this->hph = $hph;
        $this->tgl_laporan_d = $tgl_laporan_d;
        $this->tgl_laporan_s = $tgl_laporan_s;
        $this->thn_produksi = $thn_produksi;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        if($this->hph == "MIM"){
            return view('reporting/xls_stokPerThn', [
                'hph' => $this->hph,
                'tgl_laporan_d' => $this->tgl_laporan_d,
                'tgl_laporan_s' => $this->tgl_laporan_s,
                'thn_produksi' => $this->thn_produksi
            ]);
        }
    }
}
