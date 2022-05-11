<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $table = 'acara';
    protected $PrimaryKey = 'id';
    protected $fillable = [
        'nama_acara', 
        'thumbnail', 
        'deskripsi_acara', 
        'tanggal_acara',
        'jam_acara',
        'id_users'
    ];
}
