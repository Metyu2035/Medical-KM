<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PasienExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pasien::all();
        return Pasien::select("nama_pasien", "gender", "tmp_lahir", "tgl_lahir", "no_hp", "alamat")->get();
    }

    public function headings(): array
    {
        return ["Nama Pasien", "Gender","Tempat lahir","Tanggal Lahir","No Hp","Alamat"];
    }
}
