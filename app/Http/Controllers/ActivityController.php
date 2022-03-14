<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityModel;
use App\Http\Requests\ActivityRequest;
use App\Http\Requests\ActivityUpdateRequest;
Use Alert;
use Illuminate\Notifications\Action;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = ActivityModel::all();
        
        return view('pages.activity.index')->with([
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $data = $request->all();

        if(!$request->hasFile('poster')):
            ActivityModel::create($data);
        else:
            $data['poster'] = $request->file('poster')->store('assets/poster', 'public');
            ActivityModel::create($data);
        endif;
        
        Alert::toast('Data berhasil ditambahkan', 'success');
        
        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = ActivityModel::findOrFail($id);
        return view('pages.activity.detail')->with([
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $kegiatan = ActivityModel::findorfail($id);

        return view('pages.activity.edit')->with([
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, $id)
    {
        $data = $request->all();
        
        if(!$request->hasFile('poster')):     
            $kegiatan = ActivityModel::findorfail($id);
            $kegiatan->update($data);
        else:
            $data['poster'] = $request->file('poster')->store('assets/poster', 'public');
            $kegiatan = ActivityModel::findorfail($id);
            $kegiatan->update($data); 
        endif;

        Alert::toast('Data berhasil diubah', 'success');
        
        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = ActivityModel::findOrFail($id);
        $kegiatan->delete();

        Alert::toast('Data berhasil dihapus', 'success');
        
        return redirect()->route('activities.index');
    }
}
