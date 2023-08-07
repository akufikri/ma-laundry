<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{    use HasFactory;
    
     use SoftDeletes;
    protected $fillable = ['id', 'pake_kuota', 'berat', 'satuan_id', 'harga', 'status', 'cabang'];
    protected $table = 'paket';

    public function satuan(){
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    
}