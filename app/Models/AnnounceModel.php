<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnounceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'announcements';
    protected $fillable = [
        'title', 'detail_announcements', 'poster'
    ];

    protected $hidden = [];
}
