<?php

namespace App\Repositories\Eloquent;

use App\Models\Meja;
use App\Repositories\Contracts\MejaRepositoryInterface;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class MejaRepository implements MejaRepositoryInterface
{
    public function getAll()
    {
        return Meja::latest()->get();
    }

    public function getById($id)
    {
        return Meja::findOrFail($id);
    }

    public function create(array $data)
    {
        $meja = Meja::create($data);

        // Auto-generate QR setelah meja dibuat
        $this->generateQrCode($meja->id_meja);

        return $meja->fresh();
    }

    public function generateQrCode($id)
    {
        $meja = Meja::findOrFail($id);

        // Target URL mengarah ke Frontend Pelanggan dengan parameter table_id
        $frontendUrl = env('FRONTEND_URL', 'http://localhost:5173') . '/order?table_id=' . $meja->id_meja;
        $qrPath = 'qrcodes/meja_' . $meja->id_meja . '.svg';

        $qrCodeImage = QrCode::format('svg')->size(300)->generate($frontendUrl);
        Storage::disk('public')->put($qrPath, $qrCodeImage);

        $meja->update(['qr_code' => $qrPath]);

        return $meja;
    }
}
