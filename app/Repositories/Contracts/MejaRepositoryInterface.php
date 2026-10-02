<?php

namespace App\Repositories\Contracts;

interface MejaRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function generateQrCode($id);
}
