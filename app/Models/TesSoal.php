<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesSoal extends Model
{
    protected $fillable = [
        'pertanyaan',
        'opsi_a','opsi_b','opsi_c','opsi_d',
        'jawaban_benar'
    ];
}
