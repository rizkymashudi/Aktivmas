<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $fillable = [
        'description', 'debet', 'credit', 'balance'
    ];

    protected $hidden = [];
}
