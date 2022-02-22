<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumatModel extends Model
{
    use HasFactory;

    protected $table = 'jumat';
    protected $fillable = [
        'photo', 'name', 'date'
    ];

    protected $hidden = [];
}
