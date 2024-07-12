<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Http\Resources\JustBoolResource;
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
     * @return JustBoolResource
     */
    public function destroy(int $id): JustBoolResource
    {
        $result = $this->imageService->deleteById($id);
        return new JustBoolResource($result);
    }
}
