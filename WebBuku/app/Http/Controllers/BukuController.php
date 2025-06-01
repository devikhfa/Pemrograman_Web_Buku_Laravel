<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $Buku = DB::table('buku')
        ->join('category', 'buku.IdCategory', '=', 'category.id')
        ->select('buku.*', 'category.NamaCategory')
        ->where('buku.Isactive', '1')
        ->get();
        return view('buku.index', compact('Buku'));

        return view(view: 'buku.index');
    }
    public function AddBuku(){
        $category = DB::table('category')->get();
        return view('buku.AddBuku', compact('category'));
    }
    public function AddBukuAction(Request $request)
    {
        //jika file foto ada yang terupload
        if(!empty($request->Sampul)){
            //maka proses berikut yang dijalankan
            $fileName = 'foto-'.uniqid().'.'.$request->Sampul->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->Sampul->move(public_path('sampul'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }
        
        DB::table('buku')->insert([
            'IdCategory'=> $request->IdCategory,
            'Judul'=> $request->Judul,           
            'Penerbit'=> $request->Penerbit,
            'TahunTerbit'=> $request->TahunTerbit,
            'Pengarang'=> $request->Pengarang,
            'Sampul'=> $fileName,
            'CreateAt'=> date ('Y-m-d'),
            'CreateBy'=> '1',
            'Isactive'=>'1',
        ]);
        return redirect()->route('index.Buku');
    }

    public function EditBuku(string $id){
        $category = DB::table('category')->get();

        $Buku = DB::table('buku')
        ->join('category', 'buku.IdCategory', '=', 'category.id')
        ->select('buku.*', 'category.NamaCategory')
        ->where('buku.id', $id)
        ->get();
        return view('Buku.EditBuku', compact('Buku', 'category'));
    }

    public function EditBukuAction(Request $request, string $id)
    {
        //foto lama
        $fotoLama = DB::table('buku')->select('Sampul')->where('id',$id)->get();
        foreach($fotoLama as $f1){
            $fotoLama = $f1->Sampul;
        }
    
        //jika foto sudah ada yang terupload
        if(!empty($request->Sampul)){
            //maka proses selanjutnya
            if(!empty($fotoLama->Sampul)) unlink(public_path('sampul'.$fotoLama->Sampul));
            //proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->Sampul->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->Sampul->move(public_path('sampul'), $fileName);
        } else{
            $fileName = $fotoLama;
        }

        DB::table('buku')->where('id', $id)->update([
            'IdCategory'=> $request->IdCategory,
            'Judul'=> $request->Judul,
            'Penerbit'=> $request->Penerbit,
            'TahunTerbit'=> $request->TahunTerbit,
            'Pengarang'=> $request->Pengarang,
            'Sampul'=> $fileName,
        ]);
        return redirect()->route('index.Buku');
    }

    public function DeleteBukuAction(string $id)
    {
        DB::table('buku')->where('id', $id)->update([
            'Isactive'=> '0'
        ]);
        return redirect()->route('index.Buku');
    }
    
}

