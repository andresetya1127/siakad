<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_prodi extends Model
{
    use HasFactory;
    protected $table = 'program_studi';
    protected $primaryKey = 'kode_prodi';

    public function kurikulum()
    {
        return $this->belongsTo(tbl_kurikulum::class);
    }
}
