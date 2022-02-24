<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JumatModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jumat';
    protected $fillable = [
        'photo', 'name', 'date', 'time_khotbah'
    ];

    protected $hidden = [];
}
