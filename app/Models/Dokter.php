<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'dokter';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama_dokter','no_hp','alamat'];
}
