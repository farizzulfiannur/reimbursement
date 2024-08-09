<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reim extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_reim',
        'deskripsi',
        'file'
    ];

    public function reimstatuses(){
        return $this->hasOne(reimStatus::class);
    }

}
