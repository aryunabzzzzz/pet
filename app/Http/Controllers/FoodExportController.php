<?php

namespace App\Http\Controllers;

use App\Jobs\ExportFood;
use App\Models\ExportedFile;
use App\Services\FoodExport\ExportService;
use App\Services\FoodService;

class FoodExportController extends Controller
{
    /**
     * @param FoodService $foodService
     */
    public function __construct(public FoodService  $foodService, public ExportService $exportService)
    {
    }

    public function export()
    {
        $foods = $this->foodService->getAll();
//        $this->exportService->export($foods);
        ExportFood::dispatch($foods);

        return redirect('/exportedFiles');
    }

    public function getFiles()
    {
        $files = ExportedFile::all();

        return view('exportedFiles', ['files' => $files]);
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
