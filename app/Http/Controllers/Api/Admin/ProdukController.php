<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;

// Ubah nama class dari ProductController menjadi ProdukController
class ProdukController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index(): JsonResponse
    {
        $products = $this->productRepo->getAll();

        return response()->json([
            'success' => true,
            'data'    => $products
        ]);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->productRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil ditambahkan!',
            'data'    => $product
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $product = $this->productRepo->getById($id);

        return response()->json([
            'success' => true,
            'data'    => $product
        ]);
    }

    public function update(StoreProductRequest $request, $id): JsonResponse
    {
        $product = $this->productRepo->update($id, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil diperbarui!',
            'data'    => $product
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $this->productRepo->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil dihapus!'
        ]);
    }
}
