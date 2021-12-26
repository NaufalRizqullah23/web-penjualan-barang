<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangModel;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = barangModel::all();
        if ($request->has('cari')) {
            $data = \App\Models\barangModel::where('id_barang','LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data = barangModel::all();
        }
        return view('index', ['barang' => $data])->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        barangModel::insert($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = barangModel::findOrFail($id);
        return view('show')->with([
            'data' => $data
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $item = barangModel::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        // $data = barang::find($req->$id);
        // $st = $harga_barang * $ij;
        // if($st >= 50000){
        //     $st * 0.9;
        // }
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = barangModel::findOrFail($id);
        $item->delete();
        return redirect('/');
    }
}
