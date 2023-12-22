<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class tbl_kurikulum extends Model
{
    use Searchable;
    use Uuids;
    use HasFactory;
    protected $table = "tbl_kurkulum";
    protected $primaryKey = "id_kurikulum";
    protected $keyType = "String";


    public function toSearchableArray(): array
    {
        return [
            'nama_kurikulum' => $this->name,
        ];
    }
    /**
     * Get the user associated with the tbl_kurikulum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prodi()
    {
        return $this->hasOne(tbl_prodi::class, 'kode_prodi', 'id_prodi');
    }
    /**
     * Get all of the comments for the tbl_semester
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function semester()
    {
        return $this->hasOne(tbl_semester::class, 'semester', 'id_semester');
    }

    /**
     * Get all of the comments for the tbl_mk_kurikulum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mk_kurikulum()
    {
        return $this->hasMany(tbl_mk_kurikulum::class, 'id_kurikulum', 'id_kurikulum');
    }


    /**
     * Get the user associated with the matakuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}
