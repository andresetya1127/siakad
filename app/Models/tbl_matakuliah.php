<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_matakuliah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "mata_kuliah";
    protected $primaryKey = "id_mk";
    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
