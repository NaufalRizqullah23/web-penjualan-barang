<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    public $timeStamps = false;
}
