<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = ['id', 'id_user', 'judul', 'tanggal', 'isi','gambar', 'status'];

    public function user()
    {
       return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
