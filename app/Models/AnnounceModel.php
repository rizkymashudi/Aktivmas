<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnounceModel extends Model
{
    use HasFactory;

    protected $table = 'announcements';
    protected $fillable = [
        'title', 'detail_announcements', 'poster'
    ];

    protected $hidden = [];
}
