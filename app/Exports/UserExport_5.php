<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_5 implements FromView
{    
    function __construct($nm_tkg,$strDt,$eDt,$thn_prod_s,$thn_prod_e,$array) {
        $this->nm_tkg = $nm_tkg;
        $this->strDt = $strDt;
        $this->eDt = $eDt;
        $this->thn_prod_s = $thn_prod_s;
        $this->thn_prod_e = $thn_prod_e;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_rekapTkg', [
            'nm_tkg' => $this->nm_tkg,
            'strDt' => $this->strDt,
            'eDt' => $this->eDt,
            'thn_prod_s' => $this->thn_prod_s,
            'thn_prod_e' => $this->thn_prod_e,
            'arr1' => $this->arr1
        ]);        
    }
}
