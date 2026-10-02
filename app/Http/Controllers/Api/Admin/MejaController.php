<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMejaRequest;
use App\Repositories\Contracts\MejaRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MejaController extends Controller
{
    protected $mejaRepo;

    public function __construct(MejaRepositoryInterface $mejaRepo)
    {
        $this->mejaRepo = $mejaRepo;
    }

    public function index(): JsonResponse
    {
        $tables = $this->mejaRepo->getAll();

        return response()->json([
            'success' => true,
            'data'    => $tables
        ]);
    }

    public function store(StoreMejaRequest $request): JsonResponse
    {
        $meja = $this->mejaRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Meja dan QR Code berhasil dibuat!',
            'data'    => $meja
        ], 201);
    }

    public function regenerateQr($id): JsonResponse
    {
        $meja = $this->mejaRepo->generateQrCode($id);

        return response()->json([
            'success' => true,
            'message' => 'QR Code meja berhasil di-generate ulang!',
            'data'    => $meja
        ]);
    }
}
