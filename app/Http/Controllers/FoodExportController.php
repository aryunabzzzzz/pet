<?php

namespace App\Http\Controllers;

use App\Services\FoodExport\ExportService;
use App\Services\FoodService;

class FoodExportController extends Controller
{
    /**
     * @param ExportService $exportService
     * @param FoodService $foodService
     */
    public function __construct(public ExportService $exportService, public FoodService  $foodService)
    {
    }

    /**
     * @return void
     */
    public function export(): void
    {
        $foods = $this->foodService->getAll();
        $this->exportService->export($foods);
    }

//    public function getAll()
//    {
//        $files = Storage::disk('public')->allFiles('foods');
//
//        $fileUrls = [];
//        foreach ($files as $file) {
//            $fileUrls[] = Storage::disk('public')->url($file);
//        }
//
//        return response()->json($fileUrls);
//    }
}
