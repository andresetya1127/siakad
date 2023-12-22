<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatakuliahRules extends FormRequest
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
        $param = $this->route('id_mk');
        return [
            'kode_mk' => 'alpha_num|required|min:3|max:10|unique:mata_kuliah,kode_mk,' . $param . ',id_matkul',
            'nama_mk' => 'required|min:3|max:100',
            'jenis_mk' => 'required|size:1|uppercase',
            'sks_tatap_muka' => 'required|numeric',
            'sks_praktek' => 'required|numeric',
            'sks_praktek_lapangan' => 'required|numeric',
            'sks_simulasi' => 'required|numeric'
        ];
    }

    public function messages()
    {
        $param = $this->route('update.matakuliah');

        return [
            '*.alpha_num' => 'Form Hanya Boleh berisi Angka Dan Huruf.',
            '*.required' => 'Form Wajib Diisi.',
            '*.min' => 'Form Min. :min karakter.',
            '*.max' => 'Form Max. :max karakter.',
            '*.uppercase' => 'Karakter Harus Kapital.',
            '*.size' => [
                'numeric' => 'form harus berukuran :size.',
                'file'    => 'form harus berukuran :size kilobyte.',
                'string'  => 'form harus berukuran :size karakter.',
                'array'   => 'form harus mengandung :size anggota.',
            ],
            'numeric' => 'Form Harus Angka.',
            'unique' => 'Data Sudah Ada.'

        ];
    }
}
