<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_kelas_kuliah extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = "kelas_kuliah";
    protected $primaryKey = "id_kelas";
    public $timestamps = false;



    /**
     * Get the user associated with the tbl_kelas_kuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function matakuliah()
    {
        return $this->hasOne(tbl_matakuliah::class, 'kode_mk', 'kode_mk');
    }
}
