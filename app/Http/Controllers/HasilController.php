<?php

namespace App\Http\Controllers;

use App\Models\HasilModel;
use Illuminate\Http\Request;

class HasilController extends Controller
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
            $hasil = HasilModel::get();
        } else {
            $hasil = HasilModel::where('user_id', $user->id)->get();
        } 
        $title = 'List Hasil';
        $subtitle = 'List Hasil';

        $data['hasil'] = $hasil;
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;

        return view('hasil.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil = HasilModel::findOrFail($id);

        $hasil->delete();

        if ($hasil) {
            //redirect dengan pesan sukses
            return redirect()->route('list-hasil')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('list-hasil')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
