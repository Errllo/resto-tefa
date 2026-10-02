<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMejaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomor_meja' => 'required|string|unique:meja,nomor_meja',
            'kapasitas'  => 'required|integer|min:1',
            'status'     => 'nullable|in:available,occupied',
        ];
    }
}
