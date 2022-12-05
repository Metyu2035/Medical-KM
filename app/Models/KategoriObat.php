<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kategori_obat';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama_kategori','keterangan'];

    public function obat()
    {
    	return $this->hasMany(Obat::class);
    }
}