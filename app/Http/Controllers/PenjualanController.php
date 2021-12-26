<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }
    
    public function beli($id){
        $barang = barangModel::find($id);
        return view('show', compact('barang'));
    }

    public function aksiBeli(Request $request){
        $penjualan = new PenjualanModel();
        $barang = barangModel::find($request->id_barang);
        $penjualan->id_barang= $request->input('id_barang');
        $penjualan->nama_pembeli= $request->input('nama_pembeli');
        $penjualan->tanggal_pembelian= $request->input('tanggal_beli');
        $penjualan->jumlah_beli= $request->input('jumlah');

        $subtotal = $penjualan->jumlah_beli * $barang->harga_barang;
        $diskon = 0;
        $harga_total = 0;

        if($subtotal >= 50000){
            $diskon = $subtotal * 0.1;
            $harga_total = $subtotal - $diskon;
        }

        $penjualan->save();

        return redirect('/')->with('tampil', 'total belanja anda ' .$subtotal. '.Rp, Selamat anda mendapat potongan sebesar ' . $diskon. '.Rp, jadi total belanja anda menjadi' .$harga_total. '.Rp');
    }
}
