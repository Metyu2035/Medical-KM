<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama_pembeli','nama_obat','jumlah_obat','harga_obat','tgl_beli','pasien_id'];

    public function obat()
    {
    	return $this->hasMany(Obat::class);
    }
    
    // Pasien
        public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
