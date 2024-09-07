<?php

namespace App\Http\Requests\admin\visualisasi;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MahasiswaAktifRequest extends FormRequest
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
            'tahun' => 'required',
            'jumlah' => 'required|integer|min:0',
            'jumlah_tf' => 'required|integer|min:0',
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
            'jumlah' => 'Jumlah Mahasiswa Aktif',
            'jumlah_tf' => 'Jumlah Mahasiswa Aktif Transfer',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::user()->id,
        ]);
    }
}
