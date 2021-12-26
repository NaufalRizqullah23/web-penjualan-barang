@extends('layouts.default')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Daftar Penjualan PT. Berkah Perkasa</h1>
                
            </div>
            
                <table class="table table-dark table-striped">
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Jumlah Pembelian</th>
                        <th>Subtotal</th>
                        <th>Diskon</th>
                        <th>Harga Total</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Pembelian</th>
                    </tr>
                    @foreach ( $penjualan as $dataPenjualan)
                        <tr>
                            <td>{{ $dataPenjualan->id_barang }}</td>
                            <td>{{ $dataPenjualan->nama_barang }}</td>
                            <td>{{ $dataPenjualan->harga_barang }}</td>
                            <td>{{ $dataPenjualan->jumlah_pembelian }}</td>
                            <td>{{ $dataPenjualan->subtotal }}</td>
                            <td>{{ $dataPenjualan->diskon }}</td>
                            <td>{{ $dataPenjualan->harga_total }}</td>
                            <td>{{ $dataPenjualan->nama_pembeli }}</td>
                            <td>{{ $dataPenjualan->tanggal_pembelian }}</td>
                        </tr>
                    @endforeach
                </table>
                
            
            <div class="mt-3">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <a href="{{ route('index') }}" class="btn btn-warning">Back</a>
                        </th>
                    </tr>
                </table> 
            </div> 
        </div>
    </div>
</section>
@endsection