@extends('layouts.default')

@section('content')
    <section>
        <div class="container mt-5">
            <h2>Pembelian</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ '/aksiBeli' }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" hidden class="form-control"  name="id_barang" value="{{$barang->id_barang}}">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Air Mineral" value="{{ $barang->nama_barang }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama">Harga Barang</label>
                            <input type="number" name="harga_barang" class="form-control" placeholder="2500" value="{{ $barang->harga_barang }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Nama Pembeli *</label>
                            <input type="text" name="nama_pembeli" class="form-control" placeholder="Budi Budiawan">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Tanggal Pembelian *</label>
                            <input type="date" name="tanggal_beli" class="form-control" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah *</label>
                            <input type="text" name="jumlah" class="form-control" placeholder="Masukan Jumlah yang akan dibeli">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success">Beli</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection