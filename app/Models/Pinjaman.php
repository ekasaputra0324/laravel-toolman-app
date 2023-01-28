<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_peminjaman'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }

}
