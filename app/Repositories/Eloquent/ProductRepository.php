<?php

namespace App\Repositories\Eloquent;

use App\Models\Produk;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Produk::with(['kategori', 'varians'])->latest()->get();
    }

    public function getById($id)
    {
        return Produk::with(['kategori', 'varians'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Upload Foto jika ada
            if (isset($data['foto']) && $data['foto'] instanceof \Illuminate\Http\UploadedFile) {
                $data['foto'] = $data['foto']->store('products', 'public');
            }

            $product = Produk::create($data);

            // Simpan Varian Unik jika dikirim
            if (!empty($data['varians']) && is_array($data['varians'])) {
                foreach ($data['varians'] as $varian) {
                    $product->varians()->create([
                        'nama_varian'  => $varian['nama_varian'],
                        'tambah_harga' => $varian['tambah_harga'] ?? 0,
                        'status'       => 'active',
                    ]);
                }
            }

            return $product->load('varians');
        });
    }

    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $product = Produk::findOrFail($id);

            if (isset($data['foto']) && $data['foto'] instanceof \Illuminate\Http\UploadedFile) {
                if ($product->foto) {
                    Storage::disk('public')->delete($product->foto);
                }
                $data['foto'] = $data['foto']->store('products', 'public');
            }

            $product->update($data);

            // Sync/Replace Varian
            if (isset($data['varians']) && is_array($data['varians'])) {
                $product->varians()->delete();
                foreach ($data['varians'] as $varian) {
                    $product->varians()->create([
                        'nama_varian'  => $varian['nama_varian'],
                        'tambah_harga' => $varian['tambah_harga'] ?? 0,
                        'status'       => 'active',
                    ]);
                }
            }

            return $product->load('varians');
        });
    }

    public function delete($id)
    {
        $product = Produk::findOrFail($id);
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }
        return $product->delete();
    }
}
