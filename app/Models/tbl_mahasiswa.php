<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mhs';
    public $timestamps = false;

    /**
     * Get the user associated with the tbl_mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mahasiswa()
    {
        return $this->hasOne(tbl_agama::class, 'id_agama', 'id_agama');
    }
}
