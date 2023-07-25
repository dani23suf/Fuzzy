<?php

namespace App\Http\Controllers;

use App\Models\RuleModel;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = RuleModel::get();
        $title = 'List Rules';
        $subtitle = 'List Rules';

        $data['rules'] = $rules ;
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;

        return view('rules.list',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Rules';
        $subtitle = 'Create Rules';

        $data['umur'] = ['Fase 1','Fase 2','Fase 3','Fase 4','Fase 5'];
        $data['beratBadan'] = ['Kurang','Sedang','Lebih'];
        $data['tinggiBadan'] = ['Pendek','Sedang','Tinggi'];
        $data['lingkarLengan'] = ['Kecil','Sedang','Besar'];
        $data['statusGizi'] = ['Gizi Buruk','Gizi Kurang','Gizi Baik','Gizi Lebih','Obesitas'];
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;

        return view('rules.create', $data);
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
            'umur' => 'required|string',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'lingkar_lengan' => 'required|string',
            'status_gizi' => 'required|string',

        ]);

        $rules = new RuleModel();
        $rules->umur = $request->umur;
        $rules->tinggi_badan = $request->tinggi_badan;
        $rules->berat_badan = $request->berat_badan;
        $rules->lingkar_lengan = $request->lingkar_lengan;
        $rules->status_gizi = $request->status_gizi;
        $rules->save();

        if ($rules) {
            //redirect dengan pesan sukses
            return redirect()->route('list-rules')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('list-rules')->with(['error' => 'Data Gagal Disimpan!']);
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
        $title = 'Edit Rules';
        $subtitle = 'List Rules';

        $rule = RuleModel::findOrFail($id);

        $data['umur'] = ['Fase 1', 'Fase 2', 'Fase 3', 'Fase 4', 'Fase 5'];
        $data['beratBadan'] = ['Kurang', 'Sedang', 'Lebih'];
        $data['tinggiBadan'] = ['Pendek', 'Sedang', 'Tinggi'];
        $data['lingkarLengan'] = ['Kecil', 'Sedang', 'Besar'];
        $data['statusGizi'] = ['Gizi Buruk', 'Gizi Kurang', 'Gizi Baik', 'Gizi Lebih', 'Obesitas'];
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;
        $data['rule'] = $rule;

        

        return view('rules.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, )
    {
        $this->validate($request, [
            'umur' => 'required|string',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'lingkar_lengan' => 'required|string',
            'status_gizi' => 'required|string',

        ]);

        $rules = RuleModel::findOrFail($request->id);
        $rules->umur = $request->umur;
        $rules->tinggi_badan = $request->tinggi_badan;
        $rules->berat_badan = $request->berat_badan;
        $rules->lingkar_lengan = $request->lingkar_lengan;
        $rules->status_gizi = $request->status_gizi;
        $rules->save();

        if ($rules) {
            //redirect dengan pesan sukses
            return redirect()->route('edit-rules',['id'=>$rules->id])->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('edit-rules',['id'=>$rules->id])->with(['error' => 'Data Gagal Diupdate!']);
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
        $rule = RuleModel::findOrFail($id);
        $rule->delete();


        if ($rule) {
            //redirect dengan pesan sukses
            return redirect()->route('list-rules')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('list-rules')->with(['error' => 'Data Gagal Dihapus!']);
        }
       
    }
}
