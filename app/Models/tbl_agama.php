<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_agama extends Model
{
    use HasFactory;
    protected $table = "tbl_agamas";
    protected $primaryKey = "id_agama";
}
