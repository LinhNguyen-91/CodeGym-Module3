<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'danh_sach_ghi_chu';
    public $timestamps = false;
    protected $dateFormat = 'U';

   
}
