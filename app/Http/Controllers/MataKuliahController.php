<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatakuliahRules;
use App\Models\tbl_matakuliah;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MataKuliahController extends Controller
{
    /*
    |---------------------------------------------------------------------------------------|
    |Protected
    |---------------------------------------------------------------------------------------|
    */
    protected $matakuliah;
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |__construct
    |---------------------------------------------------------------------------------------|
    */
    public function __construct(tbl_matakuliah $mk)
    {
        $this->matakuliah = $mk;
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------
    | Index Matakuliah
    |---------------------------------------------------------------------------------------
    */
    public function index()
    {
        $matakuliah = $this->matakuliah::orderBy('id_mk', 'desc')->paginate(15);

        return view('admin.matakuliah.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    | Cari Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function cari_matakuliah(Request $request)
    {
        $keyword = $request->data_result;
        if ($request->data_result) {
            $matakuliah = $this->matakuliah::where('nama_mk', 'like', '%' . $keyword . '%')
                ->orWhere('kode_mk', 'like', '%' . $keyword . '%')
                ->orWhere('jenis_mk', 'like', '%' . $keyword . '%')
                ->paginate(15);
        } else {
            $matakuliah = $this->matakuliah::paginate(15);
        }

        return view('admin.matakuliah.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }

    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    | Form Tambah Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_matakuliah(Request $request)
    {
        $input = [
            [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Kode Matakuliah',
                'type' => 'text',
                'name' => 'kode_mk',
                'placeholder' => 'Kode Matakuliah...'
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Nama Matakuliah',
                'type' => 'text',
                'name' => 'nama_mk',
                'placeholder' => 'Nama Matakuliah...'
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Jenis Matakuliah',
                'type' => 'text',
                'name' => 'jenis_mk',
                'placeholder' => 'Jenis Matakuliah...'
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Tatap Muka',
                'type' => 'number',
                'name' => 'sks_tatap_muka',
                'placeholder' => 'SKS Tatap Muka...'
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Praktek',
                'type' => 'number',
                'name' => 'sks_praktek',
                'placeholder' => 'SKS Praktek...'
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Praktek Lapangan',
                'type' => 'number',
                'name' => 'sks_praktek_lapangan',
                'placeholder' => 'SKS Praktek...'
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Simulasi',
                'type' => 'number',
                'name' => 'sks_simulasi',
                'placeholder' => 'SKS Simulasi...'
            ],
        ];

        $link = route('save.matakuliah');

        return view('admin.form.tambah', [
            'page' => 'Tambah Matakuliah',
            'input' => $input,
            'link' => $link
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------
    | Simpan Data matakuliah Ke Database
    |---------------------------------------------------------------------------------------
    */
    public function save_matakuliah(MatakuliahRules $request)
    {

        $matakuliah = $this->matakuliah;

        try {
            DB::beginTransaction();

            $matakuliah->kode_mk = $request->kode_mk;
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->jenis_mk = $request->jenis_mk;
            $matakuliah->sks_tatap_muka = $request->sks_tatap_muka;
            $matakuliah->sks_praktek = $request->sks_praktek;
            $matakuliah->sks_praktek_lapangan = $request->sks_praktek_lapangan;
            $matakuliah->sks_simulasi = $request->sks_simulasi;
            $matakuliah->id_matkul = Str::uuid()->toString();
            $matakuliah->save();

            DB::commit();

            return redirect()->route('admin.matakuliah')->with([
                'msg' => 'Matakuliah Berhasil Disimpan.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with([
                'msg' => 'Terjadi Kesalahan.',
                'type' => 'error'
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Tampil Edit Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function edit_matakuliah($id)
    {
        $mk = $this->matakuliah->where('id_matkul', $id)->first();

        $input = [
            [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Kode Matakuliah',
                'type' => 'text',
                'name' => 'kode_mk',
                'placeholder' => 'Kode Matakuliah...',
                'value' => $mk->kode_mk
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Nama Matakuliah',
                'type' => 'text',
                'name' => 'nama_mk',
                'placeholder' => 'Nama Matakuliah...',
                'value' => $mk->nama_mk
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Jenis Matakuliah',
                'type' => 'text',
                'name' => 'jenis_mk',
                'placeholder' => 'Jenis Matakuliah...',
                'value' => $mk->jenis_mk
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Tatap Muka',
                'type' => 'number',
                'name' => 'sks_tatap_muka',
                'placeholder' => 'SKS Tatap Muka...',
                'value' => $mk->sks_tatap_muka
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Praktek',
                'type' => 'number',
                'name' => 'sks_praktek',
                'placeholder' => 'SKS Praktek...',
                'value' => $mk->sks_praktek
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Praktek Lapangan',
                'type' => 'number',
                'name' => 'sks_praktek_lapangan',
                'placeholder' => 'SKS Praktek Lapangan..',
                'value' => $mk->sks_praktek_lapangan
            ], [
                'length' => 'col-xxl-3 col-xl-6 col-md-6',
                'title' => 'SKS Simulasi',
                'type' => 'number',
                'name' => 'sks_simulasi',
                'placeholder' => 'SKS Simulasi...',
                'value' => $mk->sks_simulasi
            ],
        ];

        $link = route('update.matakuliah', $mk->id_matkul);

        return view('admin.form.edit', [
            'page' => 'Edit Matakuliah',
            'data' => $mk,
            'input' => $input,
            'link' => $link
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Update Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function update_matakuliah(MatakuliahRules $request, $id)
    {

        $matakuliah = $this->matakuliah->where('id_matkul', $id)->first();

        try {
            DB::beginTransaction();

            $matakuliah->kode_mk = $request->kode_mk;
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->jenis_mk = $request->jenis_mk;
            $matakuliah->sks_tatap_muka = $request->sks_tatap_muka;
            $matakuliah->sks_praktek = $request->sks_praktek;
            $matakuliah->sks_praktek_lapangan = $request->sks_praktek_lapangan;
            $matakuliah->sks_simulasi = $request->sks_simulasi;
            $matakuliah->save();

            DB::commit();

            return redirect()->route('admin.matakuliah')->with([
                'msg' => 'Matakuliah Berhasil Diubah.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with([
                'msg' => 'Terjadi Kesalahan.',
                'type' => 'error'
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Hapus Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function delete_matakuliah($id)
    {
        $matakuliah = $this->matakuliah->where('id_matkul', $id)->first();

        $matakuliah->delete();
        return redirect()->back()->with([
            'msg' => 'Data Berhasil Dihapus.',
            'type' => 'success'
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Trash Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function trash_matakuliah()
    {
        // $matakuliah = $this->matakuliah->onlyTrashed()->paginate(10);

        return view('admin.matakuliah.trash', [
            'page' => 'Trash',
            // 'matakuliah' => $matakuliah,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Generate PDF Matakuliah
    |
    |***************************************required****************************************
    |$data = data yang ingin di Cetak
    |$thead = memabut Heading Table
    |$fields= field yang ingin ditampilkan
    |---------------------------------------------------------------------------------------|

    *********************Config************************

     return [
        'mode'                       => '',
        'format'                     => 'A4',
        'default_font_size'          => '12',
        'default_font'               => 'sans-serif',
        'margin_left'                => 10,
        'margin_right'               => 10,
        'margin_top'                 => 10,
        'margin_bottom'              => 10,
        'margin_header'              => 0,
        'margin_footer'              => 0,
        'orientation'                => 'P',
        'title'                      => 'Laravel mPDF',
        'author'                     => '',
        'watermark'                  => '',
        'show_watermark'             => false,
        'show_watermark_image'       => false,
        'watermark_font'             => 'sans-serif',
        'display_mode'               => 'fullpage',
        'watermark_text_alpha'       => 0.1,
        'watermark_image_path'       => '',
        'watermark_image_alpha'      => 0.2,
        'watermark_image_size'       => 'D',
        'watermark_image_position'   => 'P',
        'custom_font_dir'            => '',
        'custom_font_data'           => [],
        'auto_language_detection'    => false,
        'temp_dir'                   => storage_path('app'),
        'pdfa'                       => false,
        'pdfaauto'                   => false,
        'use_active_forms'           => false,
    ];
    */

    public function pdf()
    {
        $thead = [
            '#',
            'Kode MK',
            'Nama MK',
            'Jenis MK',
            'SKS Tatap Muka',
            'SKS Praktek',
            'SKS Praktek Lapangan',
            'SKS Simulasi',
            'Prodi'
        ];

        $fields = [
            'loopNum',
            'kode_mk',
            'nama_mk',
            'jenis_mk',
            'sks_tatap_muka',
            'sks_praktek',
            'sks_praktek_lapangan',
            'sks_simulasi',
            'nama_program_studi'
        ];

        $data = $this->matakuliah->join('program_studi', 'mata_kuliah.kode_prodi', '=', 'program_studi.kode_prodi')->get();
        $pdf = FacadePdf::loadView('pages.pdf',  [
            'data' => $data,
            'thead' => $thead,
            'fields' => $fields,
            'title' => 'Matakuliah',
        ])->setPaper('legal', 'landscape');

        return $pdf->download();
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
