<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;

class ImageService
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Image::all();
    }

    /**
     * @param int $id
     * @return Image
     */
    public function getById(int $id): Image
    {
        return Image::find($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        Image::destroy($id);
        return true;
    }
}
