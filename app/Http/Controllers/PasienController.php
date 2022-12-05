<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_gender = ['L','P'];
        // ->select('pasien.*')
        // ->get();
        return view('form.pasien',compact('ar_gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ar_gender = ['L','P'];
        // ->select('pasien.*')
        // ->get();
        return view('form.pasien',compact('ar_gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 //proses input pegawai
        $request->validate([
            'nama_pasien' => 'required|max:45',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|max:45',
            'no_hp' => 'required|numeric|min:9',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->nama_pasien.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img'),$fileName);
        }
        else{
            $fileName = '';
        }

         DB::table('pasien')->insert(
            [
                'nama_pasien'=>$request->nama_pasien,
                'gender'=>$request->gender,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);
       
        return redirect()->route('pasien.index')
                        ->with('success','Data Pegawai Baru Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $row = Pasien::find($id);
         return view('pasien.form_edit',compact('row'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|max:45',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|max:45',
            'no_hp' => 'required|numeric|min:9|max:20',
            'alamat' => 'nullable|string|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

                //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('pasien')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('img/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->nip.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        DB::table('pasien')->insert(
            [
                'nama'=>$request->nama,
                'gender'=>$request->gender,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);
        return redirect('/pasien'.'/'.$id)
                        ->with('success','Data Pegawai Berhasil Diubah');
    }

    public function pasienPDF()
    {
        $pasien = Pasien::all(); 
        //dd($pegawai);
        $pdf = PDF::loadView('form.pasienPDF',['pasien'=>$pasien]);
        return $pdf->download('data Pasien.pdf');
    }
    public function pasienExcel() 
    {
        return Excel::download(new PasienExport, 'data_pasien.xlsx');
    }
}
