<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_matakuliah extends Model
{
    use HasFactory;
    protected $table = "mata_kuliah";
    protected $primaryKey = "id_mk";
}
