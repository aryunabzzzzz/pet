<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Services\ImageService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImageController extends Controller
{
    public function __construct(public ImageService $imageService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $images = $this->imageService->getAll();
        return ImageResource::collection($images);
    }

    /**
     * @param int $id
     * @return ImageResource
     */
    public function show(int $id): ImageResource
    {
        $image = $this->imageService->getById($id);
        return new ImageResource($image);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->imageService->deleteById($id);
    }
}
