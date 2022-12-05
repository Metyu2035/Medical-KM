<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'obat';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kode_obat','nama_obat','penyimpanan','stock','unit','nama_kategori','kadaluarsa','keterangan','harga_obat','nama_supplier','nama_kategori_id','pembelian_id'];

    //tabel relasi merujuk/merefer ke tabel master/acuan
    public function kategori()
    {
        return $this->belongsTo(KategoriObat::class);
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}


