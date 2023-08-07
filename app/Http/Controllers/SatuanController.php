<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function satuan()
    {
        $satuan = Satuan::all();
        return view('layouts.satuan', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function post_satuan(Request $request)
    {   
       $request->validate([
        'satuan_unit' => 'required',
        'deskripsi' => 'required'
       ]);

       $satuan = Satuan::create([
        'satuan_unit' => $request->satuan_unit,
        'status' => 'aktif',
        'deskripsi' => $request->deskripsi
       ]);
       $satuan->save();
        
        return redirect()->back();
    }
  public function nonaktif($id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->update([
            'status' => 'nonaktif',
        ]);

        return redirect()->back();
    }

    public function aktif($id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->update([
            'status' => 'aktif',
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show_satuan($id)
    {
        $satuan = Satuan::find($id);
        return view('update.update_satuan' ,compact('satuan'));
    }

    public function update_satuan(Request $request, $id){
        $request->validate([
            'satuan_unit' => 'required',
            'deskripsi' => 'required'
        ]);
        $satuan = Satuan::find($id);
      
       if ($satuan->update($request->all())) {
         return redirect('satuan');
            
       }
       else{
       return redirect()->back();
       }
    }
    public function delete($id){
        $satuan = Satuan::findorfail($id);

        $satuan->delete($id);

        return redirect()->back();
    }
}