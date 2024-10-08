<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function sarpras()
    {
        return $this->belongsTo(sarpras::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
