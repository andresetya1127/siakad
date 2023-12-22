<?php

namespace App\Http\Controllers;

use App\Models\tbl_kurikulum;
use App\Models\tbl_matakuliah;
use App\Models\tbl_mk_kurikulum;
use App\Models\tbl_semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


class KurikulumController extends Controller
{
    /*
    |---------------------------------------------------------------------------------------|
    |Protected
    |---------------------------------------------------------------------------------------|
    */
    protected $log;
    protected $kurikulum;
    protected $mk_kur;
    protected $matakuliah;
    protected $semester;
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |__construct
    |---------------------------------------------------------------------------------------|
    */
    public function __construct(tbl_kurikulum $kurikulum, tbl_matakuliah $matakuliah, tbl_mk_kurikulum $mk_kur, tbl_semester $semester)
    {
        $this->log = Log::channel('siakad');
        $this->kurikulum = $kurikulum;
        $this->mk_kur = $mk_kur;
        $this->matakuliah = $matakuliah;
        $this->semester = $semester;
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */


    /*
    |---------------------------------------------------------------------------------------
    | Index Kurikulum
    |---------------------------------------------------------------------------------------
    */
    public function index()
    {
        $kurikulum = $this->kurikulum::with(
            'prodi:kode_prodi,nama_program_studi',
            'semester:semester,nama_semester'
        )->paginate(10);

        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Cari Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function cari_kurikulum(Request $request)
    {
        $keyword = $request->data_result;

        if ($request->data_result) {
            $kurikulum = $this->kurikulum::where('nama_kurikulum', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_lulus', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_wajib', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_pilihan', 'like', '%' . $keyword . '%')
                ->whereRelation('prodi', 'nama_program_studi', 'like', '%' . $keyword . '%')
                ->orWhereRelation('semester', 'nama_semester', 'like', '%' . $keyword . '%')
                ->orWhereRelation('semester', 'nama_semester', 'like', '%' . $keyword . '%')
                ->paginate(10);
        } else {
            $kurikulum = $this->kurikulum::paginate(10);
        }

        $this->log->info('User mencari data Kurikulum', ['user' => Auth::user()->name, 'keyword' => $keyword]);

        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Form Tambah Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_kurikulum()
    {
        $semester = $this->kurikulum::get();

        return view('admin.kurikulum.tambah-kurikulum', [
            'page' => 'Tambah Kurikulum',
            'semester' => $semester,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Simpan Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function simpan_kurikulum(Request $request)
    {
        $msg = ['nm_kurikulum.required' => 'Nama Kurikulum Wajib Diisi.'];

        $validator = Validator::make($request->all(), [
            'nm_kurikulum' => 'required',
            'program_studi' => 'required',
            'sks_wajib' => 'required|numeric',
            'sks_pilihan' => 'required|numeric',
            'masa_berlaku' => 'required',
        ], $msg);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Terjadi Kesalahan.',
                'errors' => $validator->errors(),
            ]);
        } else {

            $kurikulum = $this->kurikulum;
            $kurikulum->nama_kurikulum = $request->nm_kurikulum;
            $kurikulum->id_prodi = $request->program_studi;
            $kurikulum->jumlah_sks_wajib = $request->sks_wajib;
            $kurikulum->jumlah_sks_pilihan = $request->sks_pilihan;
            $kurikulum->jumlah_sks_lulus = $request->sks_wajib + $request->sks_pilihan;
            $kurikulum->id_semester = $request->masa_berlaku;
            $kurikulum->status = 1;
            $kurikulum->save();

            return response()->json([
                'success' => 'Kurikulum Berhasil Ditambah.',
                'route' => route('admin.kurikulum')
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */







    /*
    |---------------------------------------------------------------------------------------|
    |Form Tambah Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function edit_kurikulum($id_kurikulum)
    {

        $kurikulum = $this->kurikulum::where('id_kurikulum', '=', $id_kurikulum)
            ->with([
                'prodi:kode_prodi,nama_program_studi',
                'semester:semester,nama_semester',
                'mk_kurikulum' => function ($query) {
                    $query->join('mata_kuliah', 'tbl_mk_kurikulum.kode_mk', '=', 'mata_kuliah.kode_mk');
                }
            ])
            ->first();

        $semester = $this->semester::get();

        return view('admin.kurikulum.edit-kurikulum', [
            'page' => 'Ubah Kurikulum',
            'semester' => $semester,
            'kurikulum' => $kurikulum
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */







    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Simpan Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function update_kurikulum(Request $request, $id)
    {
        $msg = ['nm_kurikulum.required' => 'Nama Kurikulum Wajib Diisi.'];

        $validator = Validator::make($request->all(), [
            'nm_kurikulum' => 'required',
            'program_studi' => 'required',
            'sks_wajib' => 'required|numeric',
            'sks_pilihan' => 'required|numeric',
            'masa_berlaku' => 'required',
        ], $msg);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Terjadi Kesalahan.',
                'errors' => $validator->errors(),
            ]);
        } else {

            $kurikulum = $this->kurikulum::find($id);
            $kurikulum->nama_kurikulum = $request->nm_kurikulum;
            $kurikulum->id_prodi = $request->program_studi;
            $kurikulum->jumlah_sks_wajib = $request->sks_wajib;
            $kurikulum->jumlah_sks_pilihan = $request->sks_pilihan;
            $kurikulum->jumlah_sks_lulus = $request->sks_wajib + $request->sks_pilihan;
            $kurikulum->id_semester = $request->masa_berlaku;
            $kurikulum->status = 1;
            $kurikulum->save();

            return response()->json([
                'success' => 'Kurikulum Berhasil Diubah.',
                'route' => route('admin.kurikulum')
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Tampil Detail Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function detail_kurikulum($id_kurikulum)
    {
        $kurikulum = $this->kurikulum::where('id_kurikulum', '=', $id_kurikulum)
            ->with([
                'prodi:kode_prodi,nama_program_studi',
                'semester:semester,nama_semester',
                'mk_kurikulum' => function ($query) {
                    $query->join('mata_kuliah', 'tbl_mk_kurikulum.kode_mk', '=', 'mata_kuliah.kode_mk');
                }
            ])
            ->first();

        $mk_kurikulum = $this->mk_kur::with('matakuliah')
            ->where('id_kurikulum', '=', $kurikulum->id_kurikulum)
            ->orderBy('id_mk_kur', 'desc')
            ->paginate(10);

        $matakuliah = $this->matakuliah::where('kode_prodi', '=', $kurikulum->id_prodi)
            ->select('kode_mk', 'nama_mk')
            ->get();



        $this->log->info('User Melihat Detail Kurikulum', ['user' => Auth::user()->name, 'Kurikulum' => $kurikulum->nama_kurikulum]);

        return view('admin.kurikulum.detail-kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum,
            'mk_kur' => $mk_kurikulum,
            'matakuliah' => $matakuliah,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Simpan matakuliah dalam Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function simpan_mk_kurikulum(Request $request, $id, $prodi)
    {
        $kode_mk = $request->kode_mk;
        $semester = $request->semester;

        try {

            DB::beginTransaction();

            if (!empty($kode_mk) && !empty($semester)) {

                foreach ($kode_mk as $key => $value) {
                    $mk = new tbl_mk_kurikulum();
                    $mk->id_kurikulum = $id;
                    $mk->kode_prodi = $prodi;
                    $mk->kode_mk = $value;
                    $mk->semester = $semester[$key];
                    $mk->save();
                }

                DB::commit();

                $this->log->info('User Berhasil Menambahkan Kurikulum', ['user' => Auth::user()->name, 'data' => $request->all()]);

                return redirect()->back()->with([
                    'msg' => 'Data Berhasil Disimpan.',
                    'type' => 'success'
                ]);
            } else {

                $this->log->warning('User Gagal Menambahkan Kurikulum', ['user' => Auth::user()->name, 'Error' => 'Data Belum Lengkap']);

                return redirect()->back()->with([
                    'msg' => 'Lengkapi Data Dengan Benar.',
                    'type' => 'error'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->log->error('Terjadi Kesalahan', ['user' => Auth::user()->name, 'Error' => $th->getMessage()]);

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
    |fungsi Hapus Mtakuliah Dalam Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function hapus_mk_kurikulum($id, $mk_kur)
    {
        $this->mk_kur::find($id)->delete();

        $this->log->warning('User Berhasil Menghapus Matakuliah Kurikulum', ['user' => Auth::user()->name, 'ID' => $mk_kur]);

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

    public function pdf($id_kur)
    {

        $kurikulum = $this->kurikulum->find($id_kur);

        $data =
            $this->mk_kur
            ->join('mata_kuliah', 'tbl_mk_kurikulum.kode_mk', '=', 'mata_kuliah.kode_mk')
            ->where('id_kurikulum', '=', $id_kur)
            ->orderBy('id_mk_kur', 'desc')
            ->get();

        $thead = [
            '#',
            'Kode MK',
            'Nama MK',
            'Jenis MK',
            'SKS Tatap Muka',
            'SKS Praktek',
            'SKS Praktek Lapangan',
            'SKS Simulasi',
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
        ];

        $pdf = FacadePdf::loadView('pages.pdf',  [
            'data' => $data,
            'thead' => $thead,
            'fields' => $fields,
            'title' => 'Kurikulum Matakuliah',
            'kurikulum' => $kurikulum,
        ])->setPaper('legal', 'landscape');

        return $pdf->stream();
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
