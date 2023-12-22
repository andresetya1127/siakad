<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mk_kurikulum extends Model
{
    use HasFactory;
    protected $table = "tbl_mk_kurikulum";
    protected $primaryKey = "id_mk_kur";
    public $timestamps = false;

    /**
     * Get all of the comments for the tbl_mk_kurikulum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get all of the comments for the tbl_mk_kurikulum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function matakuliah()
    {
        return $this->hasOne(tbl_matakuliah::class, 'kode_mk', 'kode_mk');
    }
}
