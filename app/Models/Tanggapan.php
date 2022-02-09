<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $fillable = ['id', 'id_user', 'tanggapan', 'id_pengaduan'];

    public function pengaduan()
    {
       return $this->hasMany(Pengaduan::class, 'id_pengaduan', id);
    }
}
