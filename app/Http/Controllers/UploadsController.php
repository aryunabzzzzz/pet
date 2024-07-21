<?php

namespace App\Http\Controllers;

use App\Http\Resources\UploadResource;
use App\Services\UploadService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UploadsController extends Controller
{
    /**
     * @param UploadService $uploadService
     */
    public function __construct(public UploadService $uploadService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $uploads = $this->uploadService->getAll();
        return UploadResource::collection($uploads);
    }

    /**
     * @param string $path
     * @param string $name
     * @return UploadResource
     */
    public function store(string $path, string $name): UploadResource
    {
        $upload = $this->uploadService->create($path, $name);
        return new UploadResource($upload);
    }
}
