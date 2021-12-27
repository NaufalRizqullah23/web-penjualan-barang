@extends('layouts.default')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Daftar Barang PT. Berkah Perkasa</h1>
                
            </div>
            
                <table class="table table-dark table-borderless text-center">
                    
                    <tr>
                        <th>ID.</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $data as $dataBarang)
                        <tr>
                            <td>{{ $dataBarang->id_barang }}</td>
                            <td>{{ $dataBarang->nama_barang }}</td>
                            <td>{{ $dataBarang->harga_barang }}</td>
                            <td><center>
                                <a href="{{ route('beli', $dataBarang->id_barang) }}" class="btn btn-success text-center">Beli</a>
                            </center>
                            </td>
                        </tr>
                    
                    @endforeach
                </table>
                
                <div class="mt3">
                    @if(session('tampil'))
           {{session('tampil')}}
                @endif
                </div>
            
            <div class="mt-3">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <a href="{{ url('create') }}" class="btn btn-primary">Tambah Barang</a>
                            <a href="{{ route('dataPenjualan') }}" class="btn btn-info">Daftar Penjualan</a>
                        </th>
                        <th>
                            <form action="" method="GET" style="text-align: right">
                                <label>Pilih :</label>
                                <input type="text" name="cari" placeholder="Masukan ID Barang">
                                <input type="submit" value="Submit">
                            </form>
                        </th>
                    </tr>
                </table>
                
                 
                        
                   
               
                
            </div> 
        </div>
    </div>
</section>
@endsection