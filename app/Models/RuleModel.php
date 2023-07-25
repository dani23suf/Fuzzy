<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleModel extends Model
{
    use HasFactory;

    protected $table = 'rules';
    protected $fillable = ['umur', 'tinggi_badan','berat_badan','lingkar_lengan','status_gizi'];


}
