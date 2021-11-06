<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'major_code',
        'uni_code',
        'major_name',
        'group',
        'last_year_standard',
    ];
    protected $guarded = [];
}
