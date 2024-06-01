<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sarpras extends Model
{
    use HasFactory;
    protected $guarded=['1'];

    public function peminjaman()
    {
    return $this->hasMany(peminjaman::class);
    }
    public function barang_keluar()
    {
        return $this->hasMany(barang_keluar::class, 'sarpras_id');
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
