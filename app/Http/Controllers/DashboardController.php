<?php

namespace App\Http\Controllers;

use App\Models\BalitaModel;
use App\Models\RuleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function z()
    {
        $data = [
            ['Fase 1', 'Kurang', 'Pendek', 'Kecil', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Pendek', 'Sedang', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Pendek', 'Besar', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Sedang', 'Kecil', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Sedang', 'Sedang', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Sedang', 'Besar', 'Gizi Baik'],
            ['Fase 1', 'Kurang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 1', 'Kurang', 'Tinggi', 'Sedang', 'Gizi Kurang'],
            ['Fase 1', 'Kurang', 'Tinggi', 'Besar', 'Gizi Kurang'],
            ['Fase 1', 'Sedang', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Tinggi', 'Kecil', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Tinggi', 'Sedang', 'Gizi Lebih'],
            ['Fase 1', 'Sedang', 'Tinggi', 'Besar', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 1', 'Lebih', 'Tinggi', 'Kecil', 'Obesitas'],
            ['Fase 1', 'Lebih', 'Tinggi', 'Sedang', 'Obesitas'],
            ['Fase 1', 'Lebih', 'Tinggi', 'Besar', 'Obesitas'],
            ['Fase 2', 'Kurang', 'Pendek', 'Kecil', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Pendek', 'Sedang', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Pendek', 'Besar', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Sedang', 'Kecil', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Sedang', 'Sedang', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Sedang', 'Besar', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Tinggi', 'Sedang', 'Gizi Kurang'],
            ['Fase 2', 'Kurang', 'Tinggi', 'Besar', 'Gizi Kurang'],
            ['Fase 2', 'Sedang', 'Pendek', 'Kecil', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Pendek', 'Sedang', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Pendek', 'Besar', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Sedang', 'Kecil', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Sedang', 'Sedang', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Sedang', 'Besar', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Tinggi', 'Kecil', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 2', 'Sedang', 'Tinggi', 'Besar', 'Gizi Baik'],
            ['Fase 2', 'Lebih', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 2', 'Lebih', 'Tinggi', 'Kecil', 'Obesitas'],
            ['Fase 2', 'Lebih', 'Tinggi', 'Sedang', 'Obesitas'],
            ['Fase 2', 'Lebih', 'Tinggi', 'Besar', 'Obesitas'],
            ['Fase 3', 'Kurang', 'Pendek', 'Kecil', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Pendek', 'Sedang', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Pendek', 'Besar', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Sedang', 'Kecil', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Sedang', 'Sedang', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Sedang', 'Besar', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Tinggi', 'Sedang', 'Gizi Kurang'],
            ['Fase 3', 'Kurang', 'Tinggi', 'Besar', 'Gizi Kurang'],
            ['Fase 3', 'Sedang', 'Pendek', 'Kecil', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Pendek', 'Sedang', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Pendek', 'Besar', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Sedang', 'Kecil', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Sedang', 'Sedang', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Sedang', 'Besar', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 3', 'Sedang', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 3', 'Sedang', 'Tinggi', 'Besar', 'Gizi Baik'],
            ['Fase 3', 'Lebih', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 3', 'Lebih', 'Tinggi', 'Kecil', 'Obesitas'],
            ['Fase 3', 'Lebih', 'Tinggi', 'Sedang', 'Obesitas'],
            ['Fase 3', 'Lebih', 'Tinggi', 'Besar', 'Obesitas'],
            ['Fase 4', 'Kurang', 'Pendek', 'Kecil', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Pendek', 'Sedang', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Pendek', 'Besar', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Sedang', 'Kecil', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Sedang', 'Sedang', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Sedang', 'Besar', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Tinggi', 'Sedang', 'Gizi Kurang'],
            ['Fase 4', 'Kurang', 'Tinggi', 'Besar', 'Gizi kurang'],
            ['Fase 4', 'Sedang', 'Pendek', 'Kecil', 'Gizi kurang'],
            ['Fase 4', 'Sedang', 'Pendek', 'Sedang', 'Gizi Baik'],
            ['Fase 4', 'Sedang', 'Pendek', 'Besar', 'Gizi Baik'],
            ['Fase 4', 'Sedang', 'Sedang', 'Kecil', 'Gizi kurang'],
            ['Fase 4', 'Sedang', 'Sedang', 'Sedang', 'Gizi Baik'],
            ['Fase 4', 'Sedang', 'Sedang', 'Besar', 'Gizi Baik'],
            ['Fase 4', 'Sedang', 'Tinggi', 'Kecil', 'Gizi kurang'],
            ['Fase 4', 'Sedang', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 4', 'Sedang', 'Tinggi', 'Besar', 'Gizi Baik'],
            ['Fase 4', 'Lebih', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 4', 'Lebih', 'Tinggi', 'Kecil', 'Gizi Baik'],
            ['Fase 4', 'Lebih', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 4', 'Lebih', 'Tinggi', 'Besar', 'Gizi Baik'],
            ['Fase 5', 'Kurang', 'Pendek', 'Kecil', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Pendek', 'Sedang', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Pendek', 'Besar', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Sedang', 'Kecil', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Sedang', 'Sedang', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Sedang', 'Besar', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Tinggi', 'Kecil', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Tinggi', 'Sedang', 'Gizi Buruk'],
            ['Fase 5', 'Kurang', 'Tinggi', 'Besar', 'Gizi Buruk'],
            ['Fase 5', 'Sedang', 'Pendek', 'Kecil', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Pendek', 'Sedang', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Pendek', 'Besar', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Sedang', 'Kecil', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Sedang', 'Sedang', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Sedang', 'Besar', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Tinggi', 'Kecil', 'Gizi Kurang'],
            ['Fase 5', 'Sedang', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 5', 'Sedang', 'Tinggi', 'Besar', 'Gizi Baik'],
            ['Fase 5', 'Lebih', 'Pendek', 'Kecil', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Pendek', 'Sedang', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Pendek', 'Besar', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Sedang', 'Kecil', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Sedang', 'Sedang', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Sedang', 'Besar', 'Gizi Lebih'],
            ['Fase 5', 'Lebih', 'Tinggi', 'Kecil', 'Gizi Baik'],
            ['Fase 5', 'Lebih', 'Tinggi', 'Sedang', 'Gizi Baik'],
            ['Fase 5', 'Lebih', 'Tinggi', 'Besar', 'Gizi Baik']
        ];

        $rule = $data;
        foreach($rule as $item)
        {
            DB::table('rules')->insert([
                'umur' => $item[0],
                'berat_badan' => $item[1],
                'tinggi_badan' => $item[2],
                'lingkar_lengan' => $item[3],
                'status_gizi'=>$item[4] ,
            ]);
        }

        dd('success');
    }



    public function y ()
    {
        $data = [
            '3 Tahun - 5 Bulan - 21 Hari',
            '1 Tahun - 5 Bulan - 0 Hari',
            '1 Tahun - 7 Bulan - 13 Hari',
            '1 Tahun - 9 Bulan - 0 Hari',
            '1 Tahun - 6 Bulan - 30 Hari',
            '1 Tahun - 3 Bulan - 3 Hari',
            '2 Tahun - 1 Bulan - 21 Hari',
            '3 Tahun - 11 Bulan - 24 Hari',
            '3 Tahun - 9 Bulan - 22 Hari',
            '2 Tahun - 5 Bulan - 26 Hari',
            '3 Tahun - 0 Bulan - 4 Hari',
            '2 Tahun - 0 Bulan - 5 Hari',
            '3 Tahun - 9 Bulan - 26 Hari',
            '3 Tahun - 4 Bulan - 7 Hari',
            '4 Tahun - 8 Bulan - 14 Hari',
            '4 Tahun - 0 Bulan - 25 Hari',
            '1 Tahun - 11 Bulan - 3 Hari',
            '3 Tahun - 8 Bulan - 19 Hari',
            '1 Tahun - 11 Bulan - 3 Hari',
            '4 Tahun - 5 Bulan - 16 Hari',
            '3 Tahun - 9 Bulan - 30 Hari',
            '4 Tahun - 0 Bulan - 25 Hari',
            '0 Tahun - 8 Bulan - 28 Hari',
            '3 Tahun - 5 Bulan - 10 Hari',
            '4 Tahun - 8 Bulan - 15 Hari',
            '1 Tahun - 11 Bulan - 15 Hari',
            '3 Tahun - 3 Bulan - 8 Hari',
            '2 Tahun - 5 Bulan - 29 Hari',
            '2 Tahun - 0 Bulan - 11 Hari',
            '2 Tahun - 3 Bulan - 26 Hari',
            '1 Tahun - 8 Bulan - 25 Hari',
            '0 Tahun - 9 Bulan - 3 Hari',
            '1 Tahun - 10 Bulan - 8 Hari',
            '0 Tahun - 6 Bulan - 26 Hari',
            '0 Tahun - 3 Bulan - 20 Hari',
            '1 Tahun - 9 Bulan - 17 Hari',
            '2 Tahun - 5 Bulan - 14 Hari',
            '1 Tahun - 4 Bulan - 2 Hari',
            '4 Tahun - 0 Bulan - 29 Hari',
            '2 Tahun - 3 Bulan - 29 Hari',
            '0 Tahun - 11 Bulan - 11 Hari',
            '2 Tahun - 11 Bulan - 8 Hari',
            '2 Tahun - 10 Bulan - 10 Hari',
            '2 Tahun - 10 Bulan - 7 Hari',
            '1 Tahun - 6 Bulan - 23 Hari',
            '1 Tahun - 4 Bulan - 12 Hari',
            '3 Tahun - 8 Bulan - 0 Hari',
            '3 Tahun - 3 Bulan - 10 Hari',
            '2 Tahun - 8 Bulan - 10 Hari',
            '4 Tahun - 2 Bulan - 15 Hari',
            '0 Tahun - 6 Bulan - 29 Hari',
            '0 Tahun - 8 Bulan - 27 Hari',
            '2 Tahun - 2 Bulan - 15 Hari',
            '3 Tahun - 3 Bulan - 27 Hari',
            '4 Tahun - 8 Bulan - 17 Hari',
            '2 Tahun - 2 Bulan - 23 Hari',
            '4 Tahun - 2 Bulan - 29 Hari',
            '2 Tahun - 4 Bulan - 21 Hari',
            '3 Tahun - 9 Bulan - 24 Hari',
            '1 Tahun - 9 Bulan - 22 Hari',
            '1 Tahun - 3 Bulan - 23 Hari',
            '2 Tahun - 0 Bulan - 1 Hari',
            '3 Tahun - 1 Bulan - 20 Hari',
            '1 Tahun - 0 Bulan - 7 Hari',
            '4 Tahun - 1 Bulan - 9 Hari',
            '1 Tahun - 8 Bulan - 29 Hari',
            '1 Tahun - 7 Bulan - 20 Hari',
            '4 Tahun - 3 Bulan - 17 Hari',
            '3 Tahun - 10 Bulan - 21 Hari',
            '2 Tahun - 10 Bulan - 21 Hari',
            '2 Tahun - 4 Bulan - 8 Hari',
            '1 Tahun - 9 Bulan - 0 Hari',
            '3 Tahun - 3 Bulan - 8 Hari',
            '2 Tahun - 2 Bulan - 17 Hari',
            '1 Tahun - 5 Bulan - 10 Hari',
            '2 Tahun - 2 Bulan - 6 Hari',
            '3 Tahun - 10 Bulan - 17 Hari',
            '3 Tahun - 0 Bulan - 17 Hari',
            '3 Tahun - 10 Bulan - 6 Hari',
            '1 Tahun - 10 Bulan - 15 Hari',
            '1 Tahun - 2 Bulan - 27 Hari',
            '4 Tahun - 11 Bulan - 15 Hari',
            '4 Tahun - 3 Bulan - 23 Hari',
            '3 Tahun - 1 Bulan - 1 Hari',
            '1 Tahun - 7 Bulan - 17 Hari',
            '1 Tahun - 3 Bulan - 17 Hari',
            '2 Tahun - 1 Bulan - 21 Hari',
            '3 Tahun - 5 Bulan - 26 Hari',
            '1 Tahun - 8 Bulan - 16 Hari',
            '4 Tahun - 10 Bulan - 5 Hari',
            '1 Tahun - 6 Bulan - 20 Hari',
            '1 Tahun - 2 Bulan - 17 Hari',
            '0 Tahun - 7 Bulan - 17 Hari',
            '3 Tahun - 7 Bulan - 21 Hari',
            '2 Tahun - 11 Bulan - 10 Hari',
            '1 Tahun - 8 Bulan - 11 Hari',
            '0 Tahun - 7 Bulan - 23 Hari',
            '2 Tahun - 5 Bulan - 2 Hari',
            '1 Tahun - 3 Bulan - 15 Hari',
            '0 Tahun - 6 Bulan - 26 Hari',
            '4 Tahun - 9 Bulan - 9 Hari',
            '2 Tahun - 0 Bulan - 29 Hari',
            '3 Tahun - 11 Bulan - 27 Hari',
            '2 Tahun - 1 Bulan - 13 Hari',
            '1 Tahun - 5 Bulan - 3 Hari',
            '0 Tahun - 5 Bulan - 27 Hari',
            '2 Tahun - 7 Bulan - 10 Hari',
            '2 Tahun - 11 Bulan - 9 Hari',
            '1 Tahun - 7 Bulan - 18 Hari',
            '1 Tahun - 9 Bulan - 26 Hari',
            '0 Tahun - 9 Bulan - 19 Hari',
            '1 Tahun - 4 Bulan - 1 Hari',
            '2 Tahun - 4 Bulan - 3 Hari',
            '3 Tahun - 7 Bulan - 10 Hari',
            '3 Tahun - 4 Bulan - 3 Hari',
            '4 Tahun - 1 Bulan - 8 Hari',
            '4 Tahun - 5 Bulan - 12 Hari',
            '3 Tahun - 3 Bulan - 24 Hari',
            '1 Tahun - 0 Bulan - 5 Hari',
            '1 Tahun - 10 Bulan - 23 Hari',
            '3 Tahun - 8 Bulan - 3 Hari',
            '3 Tahun - 5 Bulan - 16 Hari',
            '1 Tahun - 4 Bulan - 21 Hari',
            '2 Tahun - 5 Bulan - 18 Hari',
            '2 Tahun - 11 Bulan - 8 Hari',
            '3 Tahun - 10 Bulan - 29 Hari',
            '1 Tahun - 8 Bulan - 2 Hari',
            '2 Tahun - 0 Bulan - 17 Hari',
            '1 Tahun - 6 Bulan - 12 Hari',
            '3 Tahun - 7 Bulan - 27 Hari',
            '4 Tahun - 10 Bulan - 4 Hari',
            '2 Tahun - 10 Bulan - 28 Hari',
            '1 Tahun - 4 Bulan - 8 Hari',
            '4 Tahun - 1 Bulan - 7 Hari',
            '1 Tahun - 3 Bulan - 29 Hari',
            '2 Tahun - 11 Bulan - 29 Hari',
            '2 Tahun - 0 Bulan - 29 Hari',
            '3 Tahun - 7 Bulan - 2 Hari',
            '3 Tahun - 1 Bulan - 14 Hari',
            '4 Tahun - 5 Bulan - 17 Hari',
            '2 Tahun - 7 Bulan - 5 Hari',
            '1 Tahun - 8 Bulan - 26 Hari',
            '3 Tahun - 10 Bulan - 1 Hari',
            '2 Tahun - 8 Bulan - 12 Hari',
            '2 Tahun - 7 Bulan - 8 Hari',
            '0 Tahun - 7 Bulan - 6 Hari',
            '3 Tahun - 9 Bulan - 23 Hari',
            '4 Tahun - 4 Bulan - 11 Hari',
            '4 Tahun - 5 Bulan - 4 Hari',
            '2 Tahun - 0 Bulan - 2 Hari',
            '2 Tahun - 2 Bulan - 16 Hari',
            '0 Tahun - 6 Bulan - 1 Hari',
            '2 Tahun - 6 Bulan - 21 Hari',
            '2 Tahun - 8 Bulan - 27 Hari',
            '4 Tahun - 3 Bulan - 16 Hari',
            '2 Tahun - 7 Bulan - 25 Hari',
            '4 Tahun - 4 Bulan - 19 Hari',
            '1 Tahun - 3 Bulan - 22 Hari',
            '4 Tahun - 9 Bulan - 8 Hari',
            '0 Tahun - 5 Bulan - 26 Hari',
            '3 Tahun - 0 Bulan - 3 Hari',
            '1 Tahun - 5 Bulan - 3 Hari',
            '4 Tahun - 0 Bulan - 30 Hari',
            '1 Tahun - 0 Bulan - 14 Hari',
            '0 Tahun - 11 Bulan - 21 Hari',
            '0 Tahun - 4 Bulan - 29 Hari',
            '3 Tahun - 11 Bulan - 12 Hari',
            '4 Tahun - 0 Bulan - 8 Hari',
            '3 Tahun - 7 Bulan - 7 Hari',
            '2 Tahun - 11 Bulan - 11 Hari',
            '3 Tahun - 8 Bulan - 20 Hari',
            '4 Tahun - 6 Bulan - 1 Hari',
            '2 Tahun - 7 Bulan - 17 Hari',
            '4 Tahun - 4 Bulan - 20 Hari',
            '4 Tahun - 2 Bulan - 30 Hari',
            '2 Tahun - 1 Bulan - 4 Hari',
            '3 Tahun - 6 Bulan - 15 Hari',
            '0 Tahun - 8 Bulan - 0 Hari',
            '3 Tahun - 2 Bulan - 6 Hari',
            '2 Tahun - 0 Bulan - 1 Hari',
            '2 Tahun - 5 Bulan - 30 Hari',
            '2 Tahun - 4 Bulan - 12 Hari',
            '1 Tahun - 10 Bulan - 17 Hari',
            '2 Tahun - 11 Bulan - 25 Hari',
            '1 Tahun - 10 Bulan - 16 Hari',
            '4 Tahun - 5 Bulan - 3 Hari',
            '3 Tahun - 5 Bulan - 12 Hari',
            '1 Tahun - 2 Bulan - 8 Hari',
            '4 Tahun - 1 Bulan - 12 Hari',
            '0 Tahun - 8 Bulan - 18 Hari',
            '0 Tahun - 11 Bulan - 17 Hari',
            '0 Tahun - 4 Bulan - 24 Hari',
            '4 Tahun - 6 Bulan - 1 Hari',
            '4 Tahun - 0 Bulan - 2 Hari',
            '4 Tahun - 1 Bulan - 1 Hari',
            '4 Tahun - 11 Bulan - 18 Hari',
            '3 Tahun - 9 Bulan - 17 Hari',
            '2 Tahun - 8 Bulan - 6 Hari',
            '3 Tahun - 11 Bulan - 22 Hari',
            '4 Tahun - 9 Bulan - 15 Hari',
            '0 Tahun - 6 Bulan - 12 Hari',
            '3 Tahun - 10 Bulan - 20 Hari',
            '1 Tahun - 4 Bulan - 30 Hari',
            '2 Tahun - 9 Bulan - 17 Hari',
            '0 Tahun - 5 Bulan - 5 Hari',
            '3 Tahun - 6 Bulan - 12 Hari',
            '2 Tahun - 10 Bulan - 15 Hari',
            '4 Tahun - 11 Bulan - 25 Hari',
            '2 Tahun - 3 Bulan - 13 Hari',
            '2 Tahun - 4 Bulan - 22 Hari',
            '1 Tahun - 5 Bulan - 15 Hari',
            '0 Tahun - 8 Bulan - 17 Hari',
            '3 Tahun - 11 Bulan - 4 Hari',
            '0 Tahun - 5 Bulan - 27 Hari',
            '1 Tahun - 9 Bulan - 26 Hari',
            '4 Tahun - 0 Bulan - 18 Hari',
            '3 Tahun - 11 Bulan - 17 Hari',
            '4 Tahun - 3 Bulan - 5 Hari',
            '3 Tahun - 9 Bulan - 13 Hari',
            '2 Tahun - 0 Bulan - 15 Hari',
            '2 Tahun - 5 Bulan - 23 Hari',
            '2 Tahun - 2 Bulan - 24 Hari',
            '0 Tahun - 5 Bulan - 17 Hari',
            '1 Tahun - 11 Bulan - 6 Hari',
            '3 Tahun - 9 Bulan - 2 Hari',
            '4 Tahun - 9 Bulan - 16 Hari',
            '3 Tahun - 7 Bulan - 8 Hari',
            '4 Tahun - 10 Bulan - 29 Hari',
            '2 Tahun - 7 Bulan - 16 Hari',
            '2 Tahun - 2 Bulan - 11 Hari',
            '2 Tahun - 11 Bulan - 25 Hari',
            '4 Tahun - 11 Bulan - 13 Hari',
            '3 Tahun - 5 Bulan - 4 Hari',
            '4 Tahun - 10 Bulan - 4 Hari',
            '2 Tahun - 6 Bulan - 24 Hari',
            '3 Tahun - 9 Bulan - 0 Hari',
            '4 Tahun - 10 Bulan - 15 Hari',
            '1 Tahun - 6 Bulan - 29 Hari',
            '0 Tahun - 2 Bulan - 6 Hari',
            '3 Tahun - 2 Bulan - 20 Hari',
            '3 Tahun - 7 Bulan - 16 Hari',
            '5 Tahun - 0 Bulan - 0 Hari',
            '2 Tahun - 2 Bulan - 26 Hari',
            '1 Tahun - 0 Bulan - 28 Hari',
            '1 Tahun - 10 Bulan - 24 Hari',
            '3 Tahun - 2 Bulan - 12 Hari',
            '2 Tahun - 9 Bulan - 5 Hari',
            '2 Tahun - 4 Bulan - 11 Hari',
            '1 Tahun - 4 Bulan - 7 Hari',
            '0 Tahun - 10 Bulan - 14 Hari',
            '0 Tahun - 7 Bulan - 10 Hari',
            '1 Tahun - 6 Bulan - 16 Hari',
            '0 Tahun - 6 Bulan - 22 Hari',
            '3 Tahun - 10 Bulan - 2 Hari',
            '2 Tahun - 9 Bulan - 24 Hari',
            '0 Tahun - 8 Bulan - 16 Hari',
            '0 Tahun - 11 Bulan - 12 Hari',
            '1 Tahun - 7 Bulan - 26 Hari',
            '1 Tahun - 8 Bulan - 28 Hari',
            '1 Tahun - 6 Bulan - 1 Hari',
            '1 Tahun - 0 Bulan - 3 Hari',
            '2 Tahun - 0 Bulan - 23 Hari',
            '4 Tahun - 1 Bulan - 29 Hari',
            '4 Tahun - 11 Bulan - 19 Hari',
            '4 Tahun - 8 Bulan - 28 Hari',
            '2 Tahun - 11 Bulan - 28 Hari',
            '2 Tahun - 0 Bulan - 19 Hari',
            '3 Tahun - 11 Bulan - 20 Hari',
            '4 Tahun - 0 Bulan - 20 Hari',
            '3 Tahun - 4 Bulan - 17 Hari',
            '1 Tahun - 8 Bulan - 16 Hari',
            '0 Tahun - 7 Bulan - 28 Hari',
            '3 Tahun - 11 Bulan - 12 Hari',
            '1 Tahun - 6 Bulan - 5 Hari',
            '4 Tahun - 6 Bulan - 8 Hari',
            '2 Tahun - 1 Bulan - 3 Hari',
            '1 Tahun - 4 Bulan - 22 Hari',
            '1 Tahun - 9 Bulan - 28 Hari',
            '3 Tahun - 4 Bulan - 17 Hari',
            '4 Tahun - 11 Bulan - 29 Hari',
            '4 Tahun - 8 Bulan - 5 Hari',
            '4 Tahun - 8 Bulan - 27 Hari',
            '3 Tahun - 11 Bulan - 3 Hari',
            '0 Tahun - 9 Bulan - 0 Hari',
            '2 Tahun - 0 Bulan - 1 Hari',
            '2 Tahun - 0 Bulan - 7 Hari',
            '3 Tahun - 3 Bulan - 15 Hari',
            '0 Tahun - 9 Bulan - 2 Hari',
            '2 Tahun - 7 Bulan - 17 Hari',
            '2 Tahun - 10 Bulan - 19 Hari',
            '1 Tahun - 2 Bulan - 6 Hari',
            '2 Tahun - 3 Bulan - 17 Hari',
            '2 Tahun - 8 Bulan - 8 Hari',
            '0 Tahun - 9 Bulan - 25 Hari',
            '3 Tahun - 0 Bulan - 15 Hari',
            '1 Tahun - 1 Bulan - 2 Hari',
            '1 Tahun - 0 Bulan - 13 Hari',
            '1 Tahun - 10 Bulan - 20 Hari',
            '1 Tahun - 7 Bulan - 9 Hari',
            '3 Tahun - 1 Bulan - 9 Hari',
            '3 Tahun - 4 Bulan - 8 Hari',
            '2 Tahun - 10 Bulan - 23 Hari',
            '1 Tahun - 0 Bulan - 11 Hari',
            '4 Tahun - 11 Bulan - 10 Hari',
            '2 Tahun - 8 Bulan - 12 Hari',
            '0 Tahun - 4 Bulan - 11 Hari',
            '2 Tahun - 3 Bulan - 27 Hari',
            '4 Tahun - 5 Bulan - 4 Hari',
            '2 Tahun - 7 Bulan - 12 Hari',
            '3 Tahun - 11 Bulan - 6 Hari',
            '2 Tahun - 5 Bulan - 30 Hari',
            '2 Tahun - 5 Bulan - 13 Hari',
            '2 Tahun - 4 Bulan - 25 Hari',
            '1 Tahun - 4 Bulan - 24 Hari',
            '3 Tahun - 0 Bulan - 19 Hari',
            '2 Tahun - 4 Bulan - 10 Hari',
            '2 Tahun - 5 Bulan - 3 Hari',
            '3 Tahun - 10 Bulan - 8 Hari',
            '3 Tahun - 11 Bulan - 18 Hari',
            '1 Tahun - 8 Bulan - 24 Hari',
            '1 Tahun - 10 Bulan - 4 Hari',
            '1 Tahun - 4 Bulan - 28 Hari',
            '2 Tahun - 3 Bulan - 12 Hari',
            '4 Tahun - 2 Bulan - 13 Hari',
            '2 Tahun - 1 Bulan - 26 Hari',
            '0 Tahun - 8 Bulan - 27 Hari',
            '0 Tahun - 10 Bulan - 7 Hari',
            '0 Tahun - 1 Bulan - 28 Hari',
            '3 Tahun - 2 Bulan - 24 Hari',
            '4 Tahun - 8 Bulan - 10 Hari',
            '4 Tahun - 5 Bulan - 12 Hari',
            '0 Tahun - 7 Bulan - 6 Hari',
            '4 Tahun - 5 Bulan - 28 Hari',
            '1 Tahun - 4 Bulan - 28 Hari',
            '0 Tahun - 7 Bulan - 21 Hari',
            '4 Tahun - 9 Bulan - 2 Hari',
            '1 Tahun - 7 Bulan - 5 Hari',
            '1 Tahun - 0 Bulan - 17 Hari',
            '3 Tahun - 0 Bulan - 19 Hari',
            '2 Tahun - 8 Bulan - 19 Hari',
            '1 Tahun - 10 Bulan - 20 Hari',
            '1 Tahun - 3 Bulan - 19 Hari',
            '2 Tahun - 9 Bulan - 16 Hari',
            '1 Tahun - 1 Bulan - 25 Hari',
            '0 Tahun - 11 Bulan - 28 Hari',
            '3 Tahun - 11 Bulan - 18 Hari',
            '3 Tahun - 3 Bulan - 7 Hari',
            '1 Tahun - 0 Bulan - 20 Hari',
            '1 Tahun - 6 Bulan - 3 Hari',
            '2 Tahun - 5 Bulan - 9 Hari',
            '2 Tahun - 1 Bulan - 27 Hari',
            '4 Tahun - 3 Bulan - 1 Hari',
            '2 Tahun - 6 Bulan - 12 Hari',
            '4 Tahun - 11 Bulan - 20 Hari',
            '4 Tahun - 10 Bulan - 27 Hari',
            '3 Tahun - 6 Bulan - 13 Hari',
            '4 Tahun - 5 Bulan - 28 Hari',
            '0 Tahun - 6 Bulan - 18 Hari',
            '1 Tahun - 11 Bulan - 16 Hari',
            '1 Tahun - 4 Bulan - 27 Hari',
            '1 Tahun - 7 Bulan - 13 Hari',
            '2 Tahun - 5 Bulan - 18 Hari',
            '1 Tahun - 9 Bulan - 25 Hari',
            '3 Tahun - 3 Bulan - 11 Hari',
            '4 Tahun - 4 Bulan - 10 Hari',
            '1 Tahun - 9 Bulan - 24 Hari',
            '0 Tahun - 11 Bulan - 23 Hari',
            '3 Tahun - 10 Bulan - 9 Hari',
            '3 Tahun - 11 Bulan - 4 Hari',
            '3 Tahun - 7 Bulan - 8 Hari',
            '4 Tahun - 10 Bulan - 16 Hari',
            '0 Tahun - 6 Bulan - 28 Hari',
            '2 Tahun - 10 Bulan - 9 Hari',
            '4 Tahun - 7 Bulan - 9 Hari',
            '2 Tahun - 0 Bulan - 29 Hari',
            '2 Tahun - 8 Bulan - 20 Hari',
            '0 Tahun - 9 Bulan - 1 Hari',
            '4 Tahun - 0 Bulan - 11 Hari',
            '3 Tahun - 1 Bulan - 29 Hari',
            '4 Tahun - 11 Bulan - 4 Hari',
            '1 Tahun - 11 Bulan - 23 Hari',
            '4 Tahun - 10 Bulan - 28 Hari',
            '2 Tahun - 8 Bulan - 4 Hari',
            '3 Tahun - 1 Bulan - 4 Hari',
            '3 Tahun - 4 Bulan - 3 Hari',
            '0 Tahun - 4 Bulan - 5 Hari',
            '3 Tahun - 10 Bulan - 28 Hari',
            '3 Tahun - 0 Bulan - 10 Hari',
            '0 Tahun - 9 Bulan - 18 Hari',
            '1 Tahun - 0 Bulan - 11 Hari',
            '2 Tahun - 10 Bulan - 3 Hari',
            '0 Tahun - 8 Bulan - 23 Hari',
            '2 Tahun - 4 Bulan - 8 Hari',
            '0 Tahun - 7 Bulan - 22 Hari',
            '1 Tahun - 5 Bulan - 6 Hari',
            '2 Tahun - 8 Bulan - 18 Hari',
            '0 Tahun - 8 Bulan - 10 Hari',
            '0 Tahun - 9 Bulan - 21 Hari',
            '1 Tahun - 2 Bulan - 22 Hari',
            '0 Tahun - 6 Bulan - 3 Hari',
            '3 Tahun - 10 Bulan - 2 Hari'
        ];


        $dataTahun = collect($data);

        $data = [];
        foreach($dataTahun as $item
        ){
            $tahun = (int) substr($item, 0, 1);
            $bulan  = (int) substr($item, 10, 2);
            $data [] = ($tahun * 12) + $bulan ;
        }

        dd($data);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();
        if($user->roles->name == 'admin'){
            $balita = BalitaModel::get()->count();
            $user = User::get()->count();
            $rules = RuleModel::get()->count();
            $data['user'] = $user;
            $data['rules'] = $rules;


        }else
        {
            $balita = BalitaModel::where('user_id', $user->id)->get()->count();
            
        }

        $data['balita'] = $balita;


        $data['title'] = 'Dashboard';
        return view('dashboard',$data);
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
}
