@extends('layouts.default')

@section('content')
    <section>
        <div class="container mt-5">
            <h2>Tambah Barang</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Barang *</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Air Mineral">
                        </div>
                        <div class="form-group">
                            <label for="nama">Harga Barang *</label>
                            <input type="number" name="harga_barang" class="form-control" placeholder="2500">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success">Tambah Barang</button>
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