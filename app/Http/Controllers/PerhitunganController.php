<?php

namespace App\Http\Controllers;

use App\Models\RuleModel;
use App\Models\BalitaModel;
use Illuminate\Http\Request;
use App\Imports\BalitaImport;
use App\Models\HasilModel;
use Illuminate\Support\Facades\DB;
use App\Models\HimpunanDetailModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth()->user();

        if ($user->roles->name == 'admin') {
            $balitas = BalitaModel::get();
        } else {
            $balitas = BalitaModel::where('user_id', $user->id)->get();
        }     
        $title = 'Cek Status Gizi';

        $data['title'] = $title;
       $data['user'] = $user ;
       $data['balitas'] = $balitas;

       return view('perhitungan.index',$data);

    }

    public function perhitungan(Request $request)
    {
      
            $balita = BalitaModel::findOrFail($request->balita);
            $item = $balita;
            $umur = $item->umur_bulan;
            $berat_badan = $item->berat_badan;
            $tinggi_badan = $item->tinggi_badan;
            $lingkar_lengan = $item->lingkar_lengan;
            // $umur = 56;
            // $berat_badan = 26.7;
            // $tinggi_badan = 117;
            // $lingkar_lengan =21;


            // fase 1 
            if ($umur <= 6) {
                $fase1 = 1;
            } elseif ($umur > 6 && $umur < 12) {
                $fase1 = (12 - $umur) / (12 - 6);
            } else {
                $fase1 = 0;
            }

            // fase 2 
            if ($umur > 6 && $umur <= 12) {
                $fase2 = ($umur - 6) / (12 - 6);
            } elseif ($umur > 6 && $umur < 24) {
                $fase2 = (24 - $umur) / (24 - 12);
            } else {
                $fase2 = 0;
            }

            // fase 3 
            if ($umur > 12 && $umur <= 24) {
                $fase3 = ($umur - 12) / (24 - 12);
            } elseif ($umur > 24 && $umur < 36) {
                $fase3 = (36 - $umur) / (36 - 24);
            } else {
                $fase3 = 0;
            }

            // fase 4 
            if ($umur > 24 && $umur <= 36) {
                $fase4 = ($umur - 24) / (36 - 24);
            } elseif ($umur > 36 && $umur < 48) {
                $fase4 = (48 - $umur) / (48 - 36);
            } else {
                $fase4 = 0;
            }

            // fase 5
            if ($umur > 36 && $umur <= 48) {
                $fase5 = ($umur - 36) / (48 - 36);
            } elseif ($umur > 48 && $umur <= 60) {
                $fase5 = 1;
            } else {
                $fase5 = 0;
            }

            // Berat Badan 
            // Kurang
            if ($berat_badan <= 7) {
                $kurang_berat = 1;
            } elseif ($berat_badan > 7 && $berat_badan < 13) {
                $kurang_berat = (13 - $berat_badan) / (13 - 7);
            } else {
                $kurang_berat = 0;
            }

            // Sedang 
            if ($berat_badan > 7 && $berat_badan <= 13) {
                $sedang_berat = ($berat_badan - 7) / (13 - 7);
            } elseif ($berat_badan > 13 && $berat_badan < 19) {
                $sedang_berat = (19 - $berat_badan) / (19 - 13);
            } else {
                $sedang_berat = 0;
            }

            // Lebih
            if ($berat_badan > 13 && $berat_badan <= 19) {
                $lebih = ($berat_badan - 13) / (19 - 13);
            } elseif ($berat_badan > 19 && $berat_badan <= 28) {
                $lebih = 1;
            } else {
                $lebih = 0;
            }

            // dd($kurang_berat,$sedang_berat,$lebih);

            // Tinggi Badan 
            // Pendek
            if ($tinggi_badan <= 49) {
                $pendek = 1;
            } elseif ($tinggi_badan > 49 && $tinggi_badan < 75) {
                $pendek = (75 - $tinggi_badan) / (75 - 49);
            } else {
                $pendek = 0;
            }

            // Sedang 
            if ($tinggi_badan > 49 && $tinggi_badan <= 75) {
                $sedang_tinggi = ($tinggi_badan - 49) / (75 - 49);
            } elseif ($tinggi_badan > 75 && $tinggi_badan < 101) {
                $sedang_tinggi = (101 - $tinggi_badan) / (101 - 75);
            } else {
                $sedang_tinggi = 0;
            }

            // Tinggi
            if ($tinggi_badan > 75 && $tinggi_badan <= 101) {
                $tinggi = ($tinggi_badan - 75) / (101 - 75);
            } elseif ($tinggi_badan > 101 && $tinggi_badan <= 124) {
                $tinggi = 1;
            } else {
                $tinggi = 0;
            }

            // dd($pendek, $sedang_tinggi, $tinggi);


            // Lingkar Lengan 
            // Pendek
            if ($lingkar_lengan <= 10) {
                $kecil = 1;
            } elseif ($lingkar_lengan > 10 && $lingkar_lengan < 14) {
                $kecil = (14 - $lingkar_lengan) / (14 - 10);
            } else {
                $kecil = 0;
            }

            // Sedang 
            if ($lingkar_lengan > 10 && $lingkar_lengan <= 14) {
                $sedang_lengan = (14 - $lingkar_lengan) / (14 - 10);
            } elseif ($lingkar_lengan > 14 && $lingkar_lengan < 18) {
                $sedang_lengan = ($lingkar_lengan - 14)  / (18 - 14);
            } else {
                $sedang_lengan = 0;
            }

            // Besar
            if ($lingkar_lengan > 14 && $lingkar_lengan <= 18) {
                $besar = ($lingkar_lengan - 14) / (18 - 14);
            } elseif ($lingkar_lengan > 18 && $lingkar_lengan <= 22) {
                $besar = 1;
            } else {
                $besar = 0;
            }

            $rule_umur = [];
            $rule_umur_value = [];

            if ($fase1 > 0) {

                $rule_umur[] = 'Fase 1';
                $rule_umur_value['Fase 1'] =  $fase1;
            }
            if ($fase2 > 0) {
                $rule_umur[] = 'Fase 2';
                $rule_umur_value['Fase 2'] =  $fase2;
            }
            if ($fase3 > 0) {
                $rule_umur[] = 'Fase 3';
                $rule_umur_value['Fase 3'] =  $fase3;
            }
            if ($fase4 > 0) {
                $rule_umur[] = 'Fase 4';
                $rule_umur_value['Fase 4'] = $fase4;
            }
            if ($fase5 > 0) {
                $rule_umur[] = 'Fase 5';
                $rule_umur_value['Fase 5'] = $fase5;
            }

            $rule_berat_badan = [];
            $rule_berat_badan_value = [];


            if ($kurang_berat > 0) {
                $rule_berat_badan[] = 'Kurang';
                $rule_berat_badan_value['Kurang'] = $kurang_berat;
            }

            if ($sedang_berat > 0) {
                $rule_berat_badan[] = 'Sedang';
                $rule_berat_badan_value['Sedang'] = $sedang_berat;
            }

            if ($lebih > 0) {
                $rule_berat_badan[] = 'Lebih';
                $rule_berat_badan_value['Lebih'] = $lebih;
            }
            $rule_tinggi_badan = [];
            $rule_tinggi_badan_value = [];


            if ($pendek > 0) {
                $rule_tinggi_badan[] = 'Pendek';
                $rule_tinggi_badan_value['Pendek'] = $pendek;
            }

            if ($sedang_tinggi > 0) {
                $rule_tinggi_badan[] = 'Sedang';
                $rule_tinggi_badan_value['Sedang'] = $sedang_tinggi;
            }

            if ($tinggi > 0) {
                $rule_tinggi_badan[] = 'Tinggi';
                $rule_tinggi_badan_value['Tinggi'] = $tinggi;
            }

            $rule_lingkar_lengan = [];
            $rule_lingkar_lengan_value = [];


            if ($kecil > 0) {
                $rule_lingkar_lengan[] = 'Kecil';
                $rule_lingkar_lengan_value['Kecil'] = $kecil;
            }

            if ($sedang_lengan > 0) {
                $rule_lingkar_lengan[] = 'Sedang';
                $rule_lingkar_lengan_value['Sedang'] = $sedang_lengan;
            }

            if ($besar > 0) {
                $rule_lingkar_lengan[] = 'Besar';
                $rule_lingkar_lengan_value['Besar'] = $besar;
            }


            // dd($kecil, $sedang_lengan, $besar);
            // dd($rule_umur, $rule_berat_badan, $rule_tinggi_badan,$rule_lingkar_lengan);


            $rules = RuleModel::whereIn('umur', $rule_umur)
                ->whereIn('berat_badan', $rule_berat_badan)
                ->whereIn('tinggi_badan', $rule_tinggi_badan)
                ->whereIn('lingkar_lengan', $rule_lingkar_lengan)
                ->get()->groupBy('status_gizi');

            // dd($rules);

            // alpha predikat
            $rulesMapping = $rules->map(function ($q) use ($rule_umur_value, $rule_tinggi_badan_value, $rule_berat_badan_value, $rule_lingkar_lengan_value) {
                return [
                    'alpaPredikat' => $q->map(function ($query) use ($rule_umur_value, $rule_tinggi_badan_value, $rule_berat_badan_value, $rule_lingkar_lengan_value) {
                        $umur = $rule_umur_value[$query->umur];
                        $tinggi_badan = $rule_tinggi_badan_value[$query->tinggi_badan];
                        $berat_badan = $rule_berat_badan_value[$query->berat_badan];
                        $lingkar_lengan = $rule_lingkar_lengan_value[$query->lingkar_lengan];

                        return min($umur, $tinggi_badan, $berat_badan, $lingkar_lengan);
                    })
                ];
                // $a_predikat = 

            });

            // Komposisi Aturan

            $komposisiAturan = $rulesMapping->map(function ($q) {
                return collect($q)->map(function ($q) {
                    return collect($q)->max();
                });
            });


            // Menentukan Nilai Tengah 
            $nilaiTengahStatusGizi = [];

            if (isset($komposisiAturan['Gizi Buruk'])) {
                $nilaiTengahStatusGizi[] =  (0 + 48) / 2;
            }
            if (isset($komposisiAturan['Gizi Kurang'])) {
                $nilaiTengahStatusGizi[] = (43 + 53) / 2;
            }
            if (isset($komposisiAturan['Gizi Baik'])) {
                $nilaiTengahStatusGizi[] = (48 + 70) / 2;
            }
            if (isset($komposisiAturan['Gizi Lebih'])) {
                $nilaiTengahStatusGizi[] = (53 + 83) / 2;
            }
            if (isset($komposisiAturan['Obesitas'])) {
                $nilaiTengahStatusGizi[] = (70 + 123) / 2;
            }

            // Menentukan Nilai Tengah 
            $tingkatKeanggotaan = [];

            if (isset($komposisiAturan['Gizi Buruk'])) {
                $tingkatKeanggotaan[] = number_format($komposisiAturan['Gizi Buruk']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Kurang'])) {
                $tingkatKeanggotaan[]
                    = number_format($komposisiAturan['Gizi Kurang']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Baik'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Gizi Baik']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Lebih'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Gizi Lebih']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Obesitas'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Obesitas']['alpaPredikat'], 4);
            }



            // Rentang dan tingkat keanggotaan
            $values = $nilaiTengahStatusGizi; // Nilai tengah himpunan fuzzy
            $memberships = $tingkatKeanggotaan; // Tingkat keanggotaan

            // Deffuzifikasi menggunakan metode Centroid
            $defuzzifiedValue = self::centroidDefuzzification($values, $memberships);

        // $domainMin = 0;
        // $domainMax = 123;
        // $numPoints = 100;
        // $defuzzifiedValue  = self::centroidDefuzzifications($komposisiAturan, $domainMin, $domainMax, $numPoints);
            // dd($defuzzifiedValue);
            // Menentukan Status Gizi 

            // Menentukan Nilai Tengah 
            $nilaiTengahStatusGizi = [];

            // $giziBuruk=  (0 + 48) / 2;
            // $giziKurang =  (43 + 53) / 2;
            // $giziNormal =  (48 + 70) / 2;
            // $giziLebih = (53 + 83) / 2;
            $giziObesitas =  (70 + 123) / 2;

            $giziBuruk =  43;
            $giziKurang =  (43 + 53) / 2;
            $giziNormal =  (48 + 70) / 2;
            $giziLebih = (53 + 83) / 2;

            // dd($giziKurang);

            // if($defuzzifiedValue < $giziBuruk)
            // {
            //     $status= 'Gizi Buruk' ;
            // }
            // elseif($defuzzifiedValue < $giziKurang)
            // {
            //     $status = 'Gizi Kurang';
            // } elseif ($defuzzifiedValue < $giziNormal) {
            //     $status = 'Gizi Baik';
            // } elseif ($defuzzifiedValue < $giziLebih) {
            //     $status = 'Gizi Lebih';
            // } else 
            // {
            //     $status = 'Obesitas';
            // }


            // Gizi Buruk 
            if ($defuzzifiedValue <= 43) {
                $giziBuruk = 1;
            } elseif ($defuzzifiedValue > 43 && $defuzzifiedValue < 48) {
                $giziBuruk = (48 - $defuzzifiedValue) / (48 - 43);
            } else {
                $giziBuruk = 0;
            }

            // Gizi Kurang
            if ($defuzzifiedValue > 43 && $defuzzifiedValue <= 48) {
                $giziKurang = ($defuzzifiedValue - 43) / (48 - 43);
            } elseif ($defuzzifiedValue > 48 && $defuzzifiedValue < 53) {
                $giziKurang = (53 - $defuzzifiedValue) / (53 - 48);
            } else {
                $giziKurang = 0;
            }

            // Gizi Baik
            if ($defuzzifiedValue > 48 && $defuzzifiedValue <= 53) {
                $giziBaik = ($defuzzifiedValue - 48) / (53 - 48);
            } elseif ($defuzzifiedValue > 53 && $defuzzifiedValue < 70) {
                $giziBaik = (70 - $defuzzifiedValue) / (70 - 53);
            } else {
                $giziBaik = 0;
            }

            // Gizi Lebih 
            if ($defuzzifiedValue > 53 && $defuzzifiedValue <= 70) {
                $giziLebih = ($defuzzifiedValue - 53) / (70 - 53);
            } elseif ($defuzzifiedValue > 70 && $defuzzifiedValue < 83) {
                $giziLebih = (83 - $defuzzifiedValue) / (83 - 70);
            } else {
                $giziLebih = 0;
            }

            // fase 5
            if ($defuzzifiedValue > 70 && $defuzzifiedValue <= 83) {
                $obesitas = ($defuzzifiedValue - 70) / (83 - 70);
            } elseif ($defuzzifiedValue > 83 && $defuzzifiedValue <= 123) {
                $obesitas = 1;
            } else {
                $obesitas = 0;
            }


            $statusGizi = [];

            $statusGizi['Gizi Buruk'] = $giziBuruk;
            $statusGizi['Gizi Kurang'] = $giziKurang;
            $statusGizi['Gizi Baik'] = $giziBaik;
            $statusGizi['Gizi Lebih'] = $giziLebih;
            $statusGizi['Obesitas'] = $obesitas;

            $value = max($statusGizi);
            $status = array_search($value, $statusGizi);
          
            $hasil = new HasilModel();
            $hasil->user_id = Auth()->user()->id;
            $hasil->balita_id = $item->id;
            $hasil->nilai_akhir = $defuzzifiedValue ?? 0;
            $hasil->status_gizi = $status;
            $hasil->save();

            if ($hasil) {
                //redirect dengan pesan sukses
                return redirect()->route('list-hasil')->with(['success' => 'Berhasil Menentukan Status Gizi!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('list-hasil')->with(['error' => 'Gagal Menentukan Status Gizi!']);
            }

        

    }

    public function perhitunganAll()
    {
        $balita = DB::table('balita')->get()->take(35);
        foreach (collect($balita) as $item) {
            $umur = $item->umur_bulan;
            $berat_badan = $item->berat_badan;
            $tinggi_badan = $item->tinggi_badan;
            $lingkar_lengan = $item->lingkar_lengan;
            // $umur = 56;
            // $berat_badan = 26.7;
            // $tinggi_badan = 117;
            // $lingkar_lengan =21;


            // fase 1 
            if ($umur <= 6) {
                $fase1 = 1;
            } elseif ($umur > 6 && $umur < 12) {
                $fase1 = (12 - $umur) / (12 - 6);
            } else {
                $fase1 = 0;
            }

            // fase 2 
            if ($umur > 6 && $umur <= 12) {
                $fase2 = ($umur - 6) / (12 - 6);
            } elseif ($umur > 6 && $umur < 24) {
                $fase2 = (24 - $umur) / (24 - 12);
            } else {
                $fase2 = 0;
            }

            // fase 3 
            if ($umur > 12 && $umur <= 24) {
                $fase3 = ($umur - 12) / (24 - 12);
            } elseif ($umur > 24 && $umur < 36) {
                $fase3 = (36 - $umur) / (36 - 24);
            } else {
                $fase3 = 0;
            }

            // fase 4 
            if ($umur > 24 && $umur <= 36) {
                $fase4 = ($umur - 24) / (36 - 24);
            } elseif ($umur > 36 && $umur < 48) {
                $fase4 = (48 - $umur) / (48 - 36);
            } else {
                $fase4 = 0;
            }

            // fase 5
            if ($umur > 36 && $umur <= 48) {
                $fase5 = ($umur - 36) / (48 - 36);
            } elseif ($umur > 48 && $umur <= 60) {
                $fase5 = 1;
            } else {
                $fase5 = 0;
            }

            // Berat Badan 
            // Kurang
            if ($berat_badan <= 7) {
                $kurang_berat = 1;
            } elseif ($berat_badan > 7 && $berat_badan < 13) {
                $kurang_berat = (13 - $berat_badan) / (13 - 7);
            } else {
                $kurang_berat = 0;
            }

            // Sedang 
            if ($berat_badan > 7 && $berat_badan <= 13) {
                $sedang_berat = ($berat_badan - 7) / (13 - 7);
            } elseif ($berat_badan > 13 && $berat_badan < 19) {
                $sedang_berat = (19 - $berat_badan) / (19 - 13);
            } else {
                $sedang_berat = 0;
            }

            // Lebih
            if ($berat_badan > 13 && $berat_badan <= 19) {
                $lebih = ($berat_badan - 13) / (19 - 13);
            } elseif ($berat_badan > 19 && $berat_badan <= 28) {
                $lebih = 1;
            } else {
                $lebih = 0;
            }

            // dd($kurang_berat,$sedang_berat,$lebih);

            // Tinggi Badan 
            // Pendek
            if ($tinggi_badan <= 49) {
                $pendek = 1;
            } elseif ($tinggi_badan > 49 && $tinggi_badan < 75) {
                $pendek = (75 - $tinggi_badan) / (75 - 49);
            } else {
                $pendek = 0;
            }

            // Sedang 
            if ($tinggi_badan > 49 && $tinggi_badan <= 75) {
                $sedang_tinggi = ($tinggi_badan - 49) / (75 - 49);
            } elseif ($tinggi_badan > 75 && $tinggi_badan < 101) {
                $sedang_tinggi = (101 - $tinggi_badan) / (101 - 75);
            } else {
                $sedang_tinggi = 0;
            }

            // Tinggi
            if ($tinggi_badan > 75 && $tinggi_badan <= 101) {
                $tinggi = ($tinggi_badan - 75) / (101 - 75);
            } elseif ($tinggi_badan > 101 && $tinggi_badan <= 124) {
                $tinggi = 1;
            } else {
                $tinggi = 0;
            }

            // dd($pendek, $sedang_tinggi, $tinggi);


            // Lingkar Lengan 
            // Pendek
            if ($lingkar_lengan <= 10) {
                $kecil = 1;
            } elseif ($lingkar_lengan > 10 && $lingkar_lengan < 14) {
                $kecil = (14 - $lingkar_lengan) / (14 - 10);
            } else {
                $kecil = 0;
            }

            // Sedang 
            if ($lingkar_lengan > 10 && $lingkar_lengan <= 14) {
                $sedang_lengan = (14 - $lingkar_lengan) / (14 - 10);
            } elseif ($lingkar_lengan > 14 && $lingkar_lengan < 18) {
                $sedang_lengan = ($lingkar_lengan - 14)  / (18 - 14);
            } else {
                $sedang_lengan = 0;
            }

            // Besar
            if ($lingkar_lengan > 14 && $lingkar_lengan <= 18) {
                $besar = ($lingkar_lengan - 14) / (18 - 14);
            } elseif ($lingkar_lengan > 18 && $lingkar_lengan <= 22) {
                $besar = 1;
            } else {
                $besar = 0;
            }

            $rule_umur = [];
            $rule_umur_value = [];

            if ($fase1 > 0) {

                $rule_umur[] = 'Fase 1';
                $rule_umur_value['Fase 1'] =  $fase1;
            }
            if ($fase2 > 0) {
                $rule_umur[] = 'Fase 2';
                $rule_umur_value['Fase 2'] =  $fase2;
            }
            if ($fase3 > 0) {
                $rule_umur[] = 'Fase 3';
                $rule_umur_value['Fase 3'] =  $fase3;
            }
            if ($fase4 > 0) {
                $rule_umur[] = 'Fase 4';
                $rule_umur_value['Fase 4'] = $fase4;
            }
            if ($fase5 > 0) {
                $rule_umur[] = 'Fase 5';
                $rule_umur_value['Fase 5'] = $fase5;
            }

            $rule_berat_badan = [];
            $rule_berat_badan_value = [];


            if ($kurang_berat > 0) {
                $rule_berat_badan[] = 'Kurang';
                $rule_berat_badan_value['Kurang'] = $kurang_berat;
            }

            if ($sedang_berat > 0) {
                $rule_berat_badan[] = 'Sedang';
                $rule_berat_badan_value['Sedang'] = $sedang_berat;
            }

            if ($lebih > 0) {
                $rule_berat_badan[] = 'Lebih';
                $rule_berat_badan_value['Lebih'] = $lebih;
            }
            $rule_tinggi_badan = [];
            $rule_tinggi_badan_value = [];


            if ($pendek > 0) {
                $rule_tinggi_badan[] = 'Pendek';
                $rule_tinggi_badan_value['Pendek'] = $pendek;
            }

            if ($sedang_tinggi > 0) {
                $rule_tinggi_badan[] = 'Sedang';
                $rule_tinggi_badan_value['Sedang'] = $sedang_tinggi;
            }

            if ($tinggi > 0) {
                $rule_tinggi_badan[] = 'Tinggi';
                $rule_tinggi_badan_value['Tinggi'] = $tinggi;
            }

            $rule_lingkar_lengan = [];
            $rule_lingkar_lengan_value = [];


            if ($kecil > 0) {
                $rule_lingkar_lengan[] = 'Kecil';
                $rule_lingkar_lengan_value['Kecil'] = $kecil;
            }

            if ($sedang_lengan > 0) {
                $rule_lingkar_lengan[] = 'Sedang';
                $rule_lingkar_lengan_value['Sedang'] = $sedang_lengan;
            }

            if ($besar > 0) {
                $rule_lingkar_lengan[] = 'Besar';
                $rule_lingkar_lengan_value['Besar'] = $besar;
            }


            // dd($kecil, $sedang_lengan, $besar);
            // dd($rule_umur, $rule_berat_badan, $rule_tinggi_badan,$rule_lingkar_lengan);


            $rules = RuleModel::whereIn('umur', $rule_umur)
                ->whereIn('berat_badan', $rule_berat_badan)
                ->whereIn('tinggi_badan', $rule_tinggi_badan)
                ->whereIn('lingkar_lengan', $rule_lingkar_lengan)
                ->get()->groupBy('status_gizi');

            // dd($rules);

            // alpha predikat
            $rulesMapping = $rules->map(function ($q) use ($rule_umur_value, $rule_tinggi_badan_value, $rule_berat_badan_value, $rule_lingkar_lengan_value) {
                return [
                    'alpaPredikat' => $q->map(function ($query) use ($rule_umur_value, $rule_tinggi_badan_value, $rule_berat_badan_value, $rule_lingkar_lengan_value) {
                        $umur = $rule_umur_value[$query->umur];
                        $tinggi_badan = $rule_tinggi_badan_value[$query->tinggi_badan];
                        $berat_badan = $rule_berat_badan_value[$query->berat_badan];
                        $lingkar_lengan = $rule_lingkar_lengan_value[$query->lingkar_lengan];

                        return min($umur, $tinggi_badan, $berat_badan, $lingkar_lengan);
                    })
                ];
                // $a_predikat = 

            });

            // Komposisi Aturan

            $komposisiAturan = $rulesMapping->map(function ($q) {
                return collect($q)->map(function ($q) {
                    return collect($q)->max();
                });
            });


            // Menentukan Nilai Tengah 
            $nilaiTengahStatusGizi = [];

            if (isset($komposisiAturan['Gizi Buruk'])) {
                $nilaiTengahStatusGizi[] =  (0 + 48) / 2;
            }
            if (isset($komposisiAturan['Gizi Kurang'])) {
                $nilaiTengahStatusGizi[] = (43 + 53) / 2;
            }
            if (isset($komposisiAturan['Gizi Baik'])) {
                $nilaiTengahStatusGizi[] = (48 + 70) / 2;
            }
            if (isset($komposisiAturan['Gizi Lebih'])) {
                $nilaiTengahStatusGizi[] = (53 + 83) / 2;
            }
            if (isset($komposisiAturan['Obesitas'])) {
                $nilaiTengahStatusGizi[] = (70 + 123) / 2;
            }

            // Menentukan Nilai Tengah 
            $tingkatKeanggotaan = [];

            if (isset($komposisiAturan['Gizi Buruk'])) {
                $tingkatKeanggotaan[] = number_format($komposisiAturan['Gizi Buruk']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Kurang'])) {
                $tingkatKeanggotaan[]
                    = number_format($komposisiAturan['Gizi Kurang']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Baik'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Gizi Baik']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Gizi Lebih'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Gizi Lebih']['alpaPredikat'], 4);
            }
            if (isset($komposisiAturan['Obesitas'])) {
                $tingkatKeanggotaan[] =
                    number_format($komposisiAturan['Obesitas']['alpaPredikat'], 4);
            }



            // Rentang dan tingkat keanggotaan
            $values = $nilaiTengahStatusGizi; // Nilai tengah himpunan fuzzy
            $memberships = $tingkatKeanggotaan; // Tingkat keanggotaan

            // Deffuzifikasi menggunakan metode Centroid
            // $defuzzifiedValue = self::centroidDefuzzification($values, $memberships);
            $domainMin = 0 ;
            $domainMax = 123 ;
            $numPoints = 100 ;
            $defuzzifiedValue  = self::centroidDefuzzifications($komposisiAturan, $domainMin, $domainMax, $numPoints);
            // dd($defuzzifiedValue);
            // Menentukan Status Gizi 

            // Menentukan Nilai Tengah 
            $nilaiTengahStatusGizi = [];

            // $giziBuruk=  (0 + 48) / 2;
            // $giziKurang =  (43 + 53) / 2;
            // $giziNormal =  (48 + 70) / 2;
            // $giziLebih = (53 + 83) / 2;
            $giziObesitas =  (70 + 123) / 2;

            $giziBuruk =  43;
            $giziKurang =  (43 + 53) / 2;
            $giziNormal =  (48 + 70) / 2;
            $giziLebih = (53 + 83) / 2;

            // dd($giziKurang);

            // if($defuzzifiedValue < $giziBuruk)
            // {
            //     $status= 'Gizi Buruk' ;
            // }
            // elseif($defuzzifiedValue < $giziKurang)
            // {
            //     $status = 'Gizi Kurang';
            // } elseif ($defuzzifiedValue < $giziNormal) {
            //     $status = 'Gizi Baik';
            // } elseif ($defuzzifiedValue < $giziLebih) {
            //     $status = 'Gizi Lebih';
            // } else 
            // {
            //     $status = 'Obesitas';
            // }


            // Gizi Buruk 
            if ($defuzzifiedValue <= 43) {
                $giziBuruk = 1;
            } elseif ($defuzzifiedValue > 43 && $defuzzifiedValue < 48) {
                $giziBuruk = (48 - $defuzzifiedValue) / (48 - 43);
            } else {
                $giziBuruk = 0;
            }

            // Gizi Kurang
            if ($defuzzifiedValue > 43 && $defuzzifiedValue <= 48) {
                $giziKurang = ($defuzzifiedValue - 43) / (48 - 43);
            } elseif ($defuzzifiedValue > 48 && $defuzzifiedValue < 53) {
                $giziKurang = (53 - $defuzzifiedValue) / (53 - 48);
            } else {
                $giziKurang = 0;
            }

            // Gizi Baik
            if ($defuzzifiedValue > 48 && $defuzzifiedValue <= 53) {
                $giziBaik = ($defuzzifiedValue - 48) / (53 - 48);
            } elseif ($defuzzifiedValue > 53 && $defuzzifiedValue < 70) {
                $giziBaik = (70 - $defuzzifiedValue) / (70 - 53);
            } else {
                $giziBaik = 0;
            }

            // Gizi Lebih 
            if ($defuzzifiedValue > 53 && $defuzzifiedValue <= 70) {
                $giziLebih = ($defuzzifiedValue - 53) / (70 - 53);
            } elseif ($defuzzifiedValue > 70 && $defuzzifiedValue < 83) {
                $giziLebih = (83 - $defuzzifiedValue) / (83 - 70);
            } else {
                $giziLebih = 0;
            }

            // fase 5
            if ($defuzzifiedValue > 70 && $defuzzifiedValue <= 83) {
                $obesitas = ($defuzzifiedValue - 70) / (83 - 70);
            } elseif ($defuzzifiedValue > 83 && $defuzzifiedValue <= 123) {
                $obesitas = 1;
            } else {
                $obesitas = 0;
            }


            $statusGizi = [];

            $statusGizi['Gizi Buruk'] = $giziBuruk;
            $statusGizi['Gizi Kurang'] = $giziKurang;
            $statusGizi['Gizi Baik'] = $giziBaik;
            $statusGizi['Gizi Lebih'] = $giziLebih;
            $statusGizi['Obesitas'] = $obesitas;
            // dd($statusGizi);

            $value = max($statusGizi);
            $status = array_search($value, $statusGizi);
            // dd($status);

            if ($status == $item->status_gizi) {
                $lo = 1;
            } else {
                $lo = 0;
            }

            DB::table('hasil')->insert([
                'status' => $status,
                'compare_status' => $item->status_gizi,
                'com' => $lo

            ]);
        }

        echo 'sukses';

    }


    function centroidDefuzzification($values, $memberships)
    {
        $numerator = 0;
        $denominator = 0;

        // Menghitung posisi centroid
        foreach ($values as $i => $value) {
            $contribution = $value * $memberships[$i];
            $numerator += $contribution;
            $denominator += $memberships[$i];
        }

        if ($denominator == 0) {
            return 0; // Menghindari pembagian dengan nol
        }

        return $numerator / $denominator; // Mengembalikan hasil deffuzifikasi
    }

    public function importDataBalita(Request $request)
    {
       

        return view('balita.import');
    }

    public function import(Request $request)
    {
        // menangkap file excel
        $file = $request->file('balita');

        
        Excel::import(new BalitaImport, $file);
     
        dd('success');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Fungsi untuk menghitung pusat massa (centroid)
    function centroidDefuzzifications($komposisiAturan, $domainMin, $domainMax, $numPoints)
    {
        $totalArea = 0;
        $weightedSum = 0;

        $step = ($domainMax - $domainMin) / ($numPoints - 1);

        for ($i = 0; $i < $numPoints; $i++) {
            $x = $domainMin + ($i * $step);

            // Hitung nilai keanggotaan setiap himpunan fuzzy pada titik x
            // $membershipValues = array_map(function ($set) use ($x) {
            //     return $set['membershipFunc']($x);
            // }, $fuzzySets);

            // Hitung total area agregat (max dari nilai keanggotaan)
            // $maxMembership = max($membershipValues);
            $maxMembership = collect($komposisiAturan)->flatten();
            
            // dd($maxMembership);
            if(isset($maxMembership[$i]))
            {

                $totalArea += $maxMembership[$i];
                $weightedSum += $x * $maxMembership[$i];

            }
          
            
            // dd($totalArea);
            // Hitung luas daerah (nilai keanggotaan * x)
        }

        if ($totalArea != 0) {
            // Hitung pusat massa dengan rumus defuzzifikasi centroid
            $centroid = $weightedSum / $totalArea;
            return $centroid;
        }

        return null;
    }
}
