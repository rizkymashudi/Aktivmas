<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'activity';
    protected $fillable = [
        'poster', 'activity_name', 'performer', 'audience_type', 'activity_detail', 'activity_date', 'activity_time'
    ];

    protected $hidden = [];

}
