<?php

namespace App\Http\Controllers;

use App\Models\BalitaModel;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();

        if ($user->roles->name == 'admin') {
            $balita = BalitaModel::get();
            
        } else {
            $balita = BalitaModel::where('user_id', $user->id)->get();
        }
        $title = 'List Balita';
        $subtitle = 'List Balita';

        $data['balita'] = $balita;
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;

        return view('balita.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Balita';
        $subtitle = 'Create Balita';

        $data['title'] = $title;
        $data['subtitle'] = $subtitle;

        return view('balita.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_balita' => 'required',
            'jenis_kelamin' => 'required',
            'umur_bulan' => 'required',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'lingkar_lengan' => 'required|string',

        ]);
        $user = Auth()->user();

        $balita = new BalitaModel();
        $balita->user_id = $user->id;
        $balita->nama = $request->nama_balita;
        $balita->jenis_kelamin = $request->jenis_kelamin;
        $balita->umur = null;
        $balita->umur_bulan = $request->umur_bulan;
        $balita->tinggi_badan = $request->tinggi_badan;
        $balita->berat_badan = $request->berat_badan;
        $balita->lingkar_lengan = $request->lingkar_lengan;
        $balita->status_gizi = null;

        $balita->save();

        if ($balita) {
            //redirect dengan pesan sukses
            return redirect()->route('list-balita')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('list-balita')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = 'Edit Balita';
        $subtitle = 'List Balita';

        $balita = BalitaModel::findOrFail($id);

        $data['title'] = $title;
        $data['subtitle'] = $subtitle;
        $data['balita'] = $balita;



        return view('balita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_balita' => 'required',
            'jenis_kelamin' => 'required',
            'umur_bulan' => 'required',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'lingkar_lengan' => 'required|string',

        ]);

        $balita = BalitaModel::findOrFail($request->id);
        $balita->nama = $request->nama_balita;
        $balita->jenis_kelamin = $request->jenis_kelamin;
        $balita->umur_bulan = $request->umur_bulan;
        $balita->tinggi_badan = $request->tinggi_badan;
        $balita->berat_badan = $request->berat_badan;
        $balita->lingkar_lengan = $request->lingkar_lengan;
        $balita->save();

        if ($balita) {
            //redirect dengan pesan sukses
            return redirect()->route('edit-balita', ['id' => $balita->id])->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('edit-balita', ['id' => $balita->id])->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Balita = BalitaModel::findOrFail($id);
        $Balita->delete();


        if ($Balita) {
            //redirect dengan pesan sukses
            return redirect()->route('list-balita')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('list-balita')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
