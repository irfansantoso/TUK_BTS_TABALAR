<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
 
class Helper {
    public static function dataLogg($lokasi) {
        $select = DB::table('tr_detail_tpn_in as tdi')
            ->leftJoin('mstr_kayu as mk', 'tdi.jns_kayu', '=', 'mk.kode_kayu')
            ->where('tdi.lokasi_tpn', $lokasi)
            ->where('tdi.position', 'current')
            ->groupBy('tdi.jns_kayu', 'mk.nama_kayu')
            ->select('mk.nama_kayu', DB::raw('COUNT(*) as total_records'),DB::raw('SUM(tdi.vol) as total_volume'))
            ->get();

        $labels = $select->pluck('nama_kayu');
        $dataValues = $select->pluck('total_records');
        $totalVolumes = $select->pluck('total_volume');

        $data = [
            'labels' => $labels,
            'dataValues' => $dataValues,
            'totalVolumes' => $totalVolumes,
        ];

        return $data;
    }

    public static function dataLogg2($lokasi) {
        $select = DB::table('tr_detail_position as tdp')
            ->leftJoin('tr_detail_tpn_in as tdi', 'tdp.no_btg', '=', 'tdi.no_btg')
            ->leftJoin('mstr_kayu as mk', 'tdi.jns_kayu', '=', 'mk.kode_kayu')
            ->where('tdp.to_lokasi', $lokasi)
            ->where('tdp.position', 'current')
            ->groupBy('tdi.jns_kayu', 'mk.nama_kayu')
            ->select('mk.nama_kayu', DB::raw('COUNT(*) as total_records'),DB::raw('SUM(tdi.vol) as total_volume'))
            ->get();

        $labels = $select->pluck('nama_kayu');
        $dataValues = $select->pluck('total_records');
        $totalVolumes = $select->pluck('total_volume');

        $data2 = [
            'labels' => $labels,
            'dataValues' => $dataValues,
            'totalVolumes' => $totalVolumes,
        ];

        return $data2;
    }
}
