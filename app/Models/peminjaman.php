<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $guarded=['1'];
    protected $table = 'peminjaman';

    public function sarpras()
    {
        return $this->belongsTo(sarpras::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
