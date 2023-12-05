<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_kurikulum extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "tbl_kurkulum";
    protected $primaryKey = "id_kurikulum";
}
