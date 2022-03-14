<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnounceModel;
use App\Http\Requests\AnnouncementRequest;
use Alert;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = AnnounceModel::all();

        return view('pages.announcement.index')->with(['announcements' => $announcements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $data = $request->all();
        
        if(!$request->hasFile('poster')):
            AnnounceModel::create($data);
        else:
            $data['poster'] = $request->file('poster')->store('assets/announcements', 'public');
            AnnounceModel::create($data);
        endif;

        Alert::toast('Data berhasil ditambahkan', 'success');

        return redirect()->route('announcements.index');

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
        $announcemenet = AnnounceModel::findOrFail($id);
        return view('pages.announcement.edit')->with(['announcement' => $announcemenet]);
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
        
        if(!$request->hasFile('poster')):     
            $announce = AnnounceModel::findorfail($id);
            $announce->update($data);
        else:
            $data['poster'] = $request->file('poster')->store('assets/announce', 'public');
            $announce = AnnounceModel::findorfail($id);
            $announce->update($data); 
        endif;

        Alert::toast('Data berhasil diubah', 'success');
        
        return redirect()->route('announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announce = AnnounceModel::findOrFail($id);
        $announce->delete();

        Alert::toast('Data berhasil dihapus', 'success');
        
        return redirect()->route('announcements.index');
    }
}
