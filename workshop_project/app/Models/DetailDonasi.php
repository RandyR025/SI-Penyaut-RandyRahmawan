<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDonasi extends Model
{
    use HasFactory;
    protected $table = 'detail_donasi';
    protected $PrimaryKey = 'id';
    protected $fillable = ['donasi', 'keterangan', 'tanggal','nominal','konfirmasi','donatur'];
}
