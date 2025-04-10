<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_5_industri implements FromView
{    
    function __construct($nmIndustri,$strDt,$eDt,$thn_prod_s,$thn_prod_e,$array) {
        $this->nmIndustri = $nmIndustri;
        $this->strDt = $strDt;
        $this->eDt = $eDt;
        $this->thn_prod_s = $thn_prod_s;
        $this->thn_prod_e = $thn_prod_e;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_rekapIndustri', [
            'nmIndustri' => $this->nmIndustri,
            'strDt' => $this->strDt,
            'eDt' => $this->eDt,
            'thn_prod_s' => $this->thn_prod_s,
            'thn_prod_e' => $this->thn_prod_e,
            'arr1' => $this->arr1
        ]);        
    }
}
