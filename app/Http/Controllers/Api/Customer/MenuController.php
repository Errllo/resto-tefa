<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Meja;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $tableId = $request->query('table_id');
        $meja = null;

        if ($tableId) {
            $meja = Meja::find($tableId);
            if (!$meja) {
                return response()->json([
                    'success' => false,
                    'message' => 'Meja tidak ditemukan atau QR Code tidak valid.'
                ], 404);
            }
        }

        $categories = Kategori::where('status', 'active')
            ->with(['produks' => function ($query) {
                $query->where('status', 'available')->with('varians');
            }])
            ->get();

        return response()->json([
            'success' => true,
            'data'    => [
                'meja'     => $meja,
                'kategori' => $categories
            ]
        ]);
    }
}
