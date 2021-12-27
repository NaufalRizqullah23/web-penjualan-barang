<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{

    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'harga_barang'
    ];
    protected $hidden;
    protected $primaryKey = 'id_barang';
}
