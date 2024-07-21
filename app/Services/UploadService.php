<?php

namespace App\Services;

use App\Models\Uploads;
use Illuminate\Support\Collection;

class UploadService
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Uploads::all();
    }

    /**
     * @param string $path
     * @param string $name
     * @return Uploads
     */
    public function create (string $path, string $name): Uploads
    {
        $upload = Uploads::create([
            'filePath' => $path,
            'name' => $name
        ]);

        return $upload;
    }
}
