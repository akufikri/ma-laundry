<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{   
    protected $table ='satuans';
     protected $fillable = ['id', 'satuan_unit','status' , 'deskripsi'];

     public function paket(){
        return $this->hasMany(Paket::class);
     }

    use HasFactory;
}