<?php

namespace App\Http\Requests\admin\visualisasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCalonMahasiswaRequest extends FormRequest
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
            'tahun' => 'sometimes|required',
            'daya_tampung' => 'sometimes|required|integer|min:0',
            'pendaftar' => 'sometimes|required|integer|min:0',
            'lulus_seleksi' => 'sometimes|required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom :attribute harus diisi',
            'integer' => 'Kolom :attribute harus berupa angka',
            'min' => 'Kolom :attribute harus lebih dari :min',
        ];
    }

    public function attributes()
    {
        return [
            'tahun' => 'Tahun',
            'daya_tampung' => 'Daya Tampung',
            'pendaftar' => 'Pendaftar',
            'lulus_seleksi' => 'Lulus Seleksi'
        ];
    }
}
