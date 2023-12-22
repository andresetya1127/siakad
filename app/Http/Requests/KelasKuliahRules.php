<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasKuliahRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'semester' => ['required', 'exists:semester,semester'],
            'matakuliah' => ['required', 'alpha_num', 'exists:mata_kuliah,kode_mk'],
            'nm_kelas' => ['required', 'max:2'],
            'lingkup_kelas' => ['required', 'alpha'],
            'mode_kuliah' => ['required', 'alpha'],
            'prodi' => ['required', 'exists:program_studi,kode_prodi'],
            // 'tgl_aktif' => ['required', 'date'],
            // 'tgl_akhir' => ['required', 'date']
        ];
    }


    public function messages()
    {
        return [
            '*.required' => 'Form Wajib Diisi.',
            '*.numeric' => 'Form Hanya Boleh Berisi Angka.',
            '*.max' => 'Form Max. :max Karakter.',
            '*.alpha_num' => 'Form Hanya Boleh Berisi Angka & Huruf.',
            '*.alpha' => 'Form Hanya Boleh Berisi Huruf.',
            '*.date' => 'Form Hanya Boleh Berisi Tanggal.',
            '*.exists' => 'Data Yang Dipilih Tidak Sesuai.',
        ];
    }
}
