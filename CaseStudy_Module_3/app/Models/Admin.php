<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'danh_sach_nguoi_dung';
    public $timestamps = false;
    protected $dateFormat = 'U';

   
}