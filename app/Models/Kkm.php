<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kkm extends Model
{
    use HasFactory;

    protected $table = 'kkm';

    protected $fillable = ['dosen_id', 'kkm'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
