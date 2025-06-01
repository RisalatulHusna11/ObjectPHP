<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'result'; 

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'kuis_1',
        'kuis_2',
        'kuis_3',
        'kuis_4',
        'kuis_5',
        'evaluasi',
        'rata_rata',
        'jawaban_json',
    ];

    protected $casts = [
    'jawaban_json' => 'array',
];
}
