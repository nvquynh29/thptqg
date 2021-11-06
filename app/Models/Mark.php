<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'sbd',
        'place_id',
        'toan',
        'van',
        'ngoai_ngu',
        'khtn',
        'ly',
        'hoa',
        'sinh',
        'su',
        'dia',
        'gdcd',
    ];
    protected $guarded = [];
}
