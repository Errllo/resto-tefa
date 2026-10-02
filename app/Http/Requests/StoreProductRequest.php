<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_kategori'            => 'required|exists:kategori,id_kategori',
            'nama_produk'            => 'required|string|max:255',
            'harga'                  => 'required|numeric|min:0',
            'stok'                   => 'required|integer|min:0',
            'deskripsi'              => 'nullable|string',
            'foto'                   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'                 => 'required|in:available,unavailable',
            'varians'                => 'nullable|array',
            'varians.*.nama_varian'  => 'required_with:varians|string|max:100',
            'varians.*.tambah_harga' => 'nullable|numeric|min:0',
        ];
    }
}
