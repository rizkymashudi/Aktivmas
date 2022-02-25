<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialReportModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'reports';
    protected $fillable = [
        'description', 'debet', 'credit', 'balance', 'date'
    ];

    protected $hidden = [];
}
