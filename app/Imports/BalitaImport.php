<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;



class BalitaImport implements ToCollection , WithStartRow , SkipsEmptyRows
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $item)
        {
            // dd($item);
            $tahun = (int) substr($item[2], 0, 1);
            $bulan  = (int) substr($item[2], 10, 2);
            $bulan_umur = ($tahun * 12) + $bulan;
            DB::table('balita')->insert([
                'user_id' => 1,
                'nama' => $item[0],
                'jenis_kelamin' => $item[1],
                'umur' => $item[2],
                'umur_bulan' => $bulan_umur,
                'tinggi_badan' => $item[4],
                'berat_badan' => $item[3],
                'lingkar_lengan' => $item[5],
                'status_gizi' => $item[10],
            ]);
        }
        
    }

    public function startRow(): int
    {
        return 2;
    }
}
