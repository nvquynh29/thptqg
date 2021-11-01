<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_nganh',
        'ma_truong',
        'ten_nganh',
        'nhom_nganh',
        'to_hop',
        'diem_chuan_nam_truoc',
        
    ];
    protected $guarded = [];
}
