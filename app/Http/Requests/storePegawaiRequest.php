<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storePegawaiRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_pegawai' => [
                'required',
                'string',
                'max:100'
            ],
            'jenis_kelamin' => [
                'required',
                Rule::in(config('pegawai.jenis_kelamin')),
            ],
            'pendidikan_terakhir' => [
                'required',
                Rule::in(config('pegawai.pendidikan_terakhir')),
            ],
            'tanggal_lahir' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
        ];
    }
}
