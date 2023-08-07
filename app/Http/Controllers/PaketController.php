<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Satuan;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function paket()
    {
        $paket = Paket::with('satuan')->paginate();
        $satuan = Satuan::all();
        return view('layouts.paket', compact('paket', 'satuan'));
    }
   public function filter(Request $request){
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $paket = Paket::whereDate('created_at','>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();
    $satuan = Satuan::all();
    return view('layouts.paket', compact('paket', 'satuan'));
    
   }

    /**
     * Show the form for creating a new resource.
     */
    public function post_paket(Request $request)
    {  
        $request->validate([
            'pake_kuota' => 'required',
            'berat' =>'required|numeric',
            'harga'=>'required|numeric',
            'satuan_id'=> "required",
            'status' => 'status',
            'cabang' => 'required'
            
        ]);

        $paket = Paket::Create([
            'pake_kuota' => $request->pake_kuota,
            'berat' => $request->berat,
            'satuan_id' => $request->satuan_id,
            'status' => 'aktif',
            'harga' => $request->harga,
            'cabang' => $request->cabang
        ]);
        $paket->save();
        return redirect()->back();
    }

     public function nonaktif($id)
    {
        $paket = Paket::findOrFail($id);

        $paket->update([
            'status' => 'nonaktif',
        ]);

        return redirect()->back();
    }

    public function aktif($id)
    {
        $paket = Paket::findOrFail($id);

        $paket->update([
            'status' => 'aktif',
        ]);

        return redirect()->back();
    }

    public function show_paket($id){
        $paket = Paket::with('satuan')->findorfail($id);
        $satuan =  Satuan::where('id', '!=', $paket->satuan_id)->get(['id','satuan_unit']);
        return view('update.update_paket', compact('paket' ,'satuan'));
    }
    public function update_paket(Request $request, $id){
          $request->validate([
            'pake_kuota' => 'required',
            'berat' =>'required|numeric',
            'harga'=>'required|numeric',
            'satuan_id'=> "required",
            'status' => 'status',
            'cabang' => 'required'
            
        ]);

        $paket = Paket::with('satuan')->find($id);
        
        $paket->update($request->all());
        
        return redirect('paket');
    }
    public function delete($id){
        $paket = Paket::findorfail($id);
        $paket->delete($id);

        return redirect()->back();
    }
    public function showTrash(){
           $trash = Paket::onlyTrashed()->get();
           return view('trash.trash_paket', compact('trash'));

    }
     public function restore($id){
        $restore_del = Paket::withTrashed()->where('id', $id)->restore();
        return redirect('/paket');
    }
    public function permanent_del($id){
        $forceDel = Paket::withTrashed()->find($id);
        if ($forceDel) {
            $forceDel->forceDelete();
        }
        return redirect()->back();
    }
}