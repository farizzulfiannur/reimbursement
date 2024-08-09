<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reimStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'reim_id',
        'status',
        'nama_penilai',
        'jabatan_penilai'
    ];

    public function reims(){
        return $this->belongsTo(reim::class);
    }
}
