<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilModel extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = ['user_id', 'balita_id', 'nilai_akhir', 'status_gizi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balita()
    {
        return $this->belongsTo(BalitaModel::class);
    }

}
