<?php

namespace App\Http\Requests\admin\visualisasi;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaLulusanRequest extends FormRequest
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
            'jumlah' => 'sometimes|required|integer|min:0',
            'ipk' => 'sometimes|required|numeric|min:0',
            'masa_studi' => 'sometimes|required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom :attribute harus diisi',
            'integer' => 'Kolom :attribute harus berupa angka',
            'min' => 'Kolom :attribute harus lebih dari :min',
            'numeric' => 'Kolom :attribute harus berupa angka',
        ];
    }

    public function attributes()
    {
        return [
            'tahun' => 'Tahun',
            'jumlah' => 'Jumlah Lulusan',
            'ipk' => 'Rata-rata IPK Lulusan',
            'masa_studi' => 'Rata-rata Masa Studi Lulusan (Tahun)',
        ];
    }
}
