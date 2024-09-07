<?php

namespace App\Http\Requests\admin\visualisasi;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MahasiswaBaruRequest extends FormRequest
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
            'lulus_seleksi' => 'sometimes|required|integer|min:0',
            'baru' => 'sometimes|required|integer|min:0',
            'baru_tf' => 'sometimes|required|integer|min:0',
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
            'lulus_seleksi' => 'Jumlah Lulus Seleksi',
            'baru' => 'Jumlah Mahasiswa Baru',
            'baru_tf' => 'Jumlah Mahasiswa Baru Transfer',
        ];
    }
}
