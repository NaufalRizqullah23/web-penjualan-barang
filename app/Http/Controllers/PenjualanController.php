<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $penjualan = PenjualanModel::all();
        return view('index1')->with([
            'penjualan' => $penjualan
        ]);
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
        $penjualan->jumlah_pembelian= $request->input('jumlah');

        $subtotal = $penjualan->jumlah_pembelian * $barang->harga_barang;
        $diskon = 0;
        $harga_total = 0;

        if($subtotal >= 50000){
            $diskon = $subtotal * 0.1;
            $harga_total = $subtotal - $diskon;
            $penjualan-> subtotal = $subtotal;
            $penjualan-> diskon = $diskon;
            $penjualan-> harga_total = $harga_total;
        }
        else{
            $harga_total = $subtotal - $diskon;
            $penjualan-> subtotal = $subtotal;
            $penjualan-> diskon = $diskon;
            $penjualan-> harga_total = $harga_total;
        }

        $penjualan->save();

        return redirect('/')->with('tampil', 'total belanja '.$penjualan->nama_pembeli. ' sebesar Rp.' .$subtotal. ' , dengan potongan harga sebesar Rp.' . $diskon. ', Sehingga harga akhir menjadi Rp.' .$harga_total);
    }

    public function getDataPenjualan(){
        $penjualan = DB::table('penjualan')
        ->join('barang', 'penjualan.id_barang', '=', 'barang.id_barang')
        ->select('penjualan.*','barang.*')
        ->get();

        return view('dataPenjualan', compact('penjualan'));
    }
}
