<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;

class ImageService
{
    public function getAll(): Collection
    {
        return Image::all();
    }

    public function getById(int $id): Image
    {
        return Image::find($id);
    }

    public function deleteById(int $id): bool
    {
        Image::destroy($id);
        return true;
    }

}
