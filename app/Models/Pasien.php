<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama_pasien','gender','tmp_lahir','tgl_lahir','email','no_hp','alamat','foto'];

    public function pembelian()
    {
    	return $this->hasMany(Pembelian::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
