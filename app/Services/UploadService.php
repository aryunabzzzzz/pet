<?php

namespace App\Services;

use App\Models\Uploads;
use Illuminate\Support\Collection;

class UploadService
{
    public function getAll(): Collection
    {
        return Uploads::all();
    }

    public function create (string $path, string $name): Uploads
    {
        $upload = Uploads::create([
            'filePath' => $path,
            'name' => $name
        ]);

        return $upload;
    }

}
