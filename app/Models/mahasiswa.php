<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    protected $primaryKey = 'mahasiswa_id';

    protected $fillable = [
        'npm',
        'username',
        'fakultas',
        'jurusan',
        'born',
        'phone',
        'address',
    ];
}
