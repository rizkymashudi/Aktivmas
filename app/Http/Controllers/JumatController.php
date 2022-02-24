<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JumatRequest;
use App\Models\JumatModel;
use Alert;

class JumatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khotbahJumat = JumatModel::all();

        return view('pages.jumat.index')->with([
            'khotbahJumat' => $khotbahJumat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jumat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JumatRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/jumat', 'public');

        JumatModel::create($data);
        Alert::toast('Data berhasil ditambahkan', 'success');

        return redirect()->route('jumat.index');
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
        $khotib = JumatModel::findOrFail($id);
        return view('pages.jumat.edit')->with(['khotib' => $khotib]);
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
        $data = $request->all();
        
        if(!$request->hasFile('photo')):     
            $khotib = JumatModel::findorfail($id);
            $khotib->update($data);
        else:
            $data['photo'] = $request->file('photo')->store('assets/jumat', 'public');
            $khotib = JumatModel::findorfail($id);
            $khotib->update($data); 
        endif;

        Alert::toast('Data berhasil diubah', 'success');
        
        return redirect()->route('jumat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khotib = JumatModel::findOrFail($id);
        $khotib->delete();

        Alert::toast('Data berhasil dihapus', 'success');
        
        return redirect()->route('jumat.index');
    }
}
