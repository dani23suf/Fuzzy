<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalitaModel extends Model
{
    use HasFactory;

    protected $table = 'balita';
    protected $fillable = ['user_id', 'nama', 'jenis_kelamin', 'umur', 'umur_bulan','tinggi_badan','berat_badan','lingkar_lengan','status_gizi'];

}
