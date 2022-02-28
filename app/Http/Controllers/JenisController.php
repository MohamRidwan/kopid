<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Jenis;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Session;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('admin.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_card = Jenis::id_card();
        $supplier = Supplier::all();
        return view('admin.jenis.create',compact('id_card','supplier')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_anggota' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'pengurus_id' => 'required',
        ]);
        $jenis = new Jenis;
        $jenis->id_card = $request->id_card;
        $jenis->nama_anggota = $request->nama_anggota;
        $jenis->no_telepon = $request->no_telepon;
        $jenis->alamat = $request->alamat;
        $jenis->pengurus_id = $request->pengurus_id;
        $jenis->save();

       
        Alert::success('Tersimpan', 'Data Jenis Barang Masuk Berhasil Tersimpan');
        return redirect()->route('jenis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_card = Jenis::id_card();
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.edit', compact('jenis','id_card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_anggota' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $jenis = Jenis::findOrFail($id);
        $jenis->id_card = $request->id_card;
        $jenis->nama_anggota = $request->nama_anggota;
        $jenis->no_telepon = $request->no_telepon;
        $jenis->alamat = $request->alamat;
        $jenis->save();

      
        Alert::success('Berhasil', 'Data Anggota Berhasil Di Edit');
        return redirect()->route('jenis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);

        if(!Jenis::destroy($id)) {
            return redirect()->back();
        } else {
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil menghapus Anggota $jenis->nama_anggota"
            ]);
            return redirect()->route('jenis.index');
        }

        $jenis->delete();
    }
}
