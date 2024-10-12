<?php

namespace App\Jobs;

use App\Models\ExportedFile;
use App\Services\FoodExport\PdfExportService;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Collection;
use App\Services\FoodExport\ExportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportFood implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected Collection $foods;
    protected ExportService $exportService;
    /**
     * Create a new job instance.
     */
    public function __construct(Collection $foods)
    {
        $this->foods = $foods;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $spreadsheet = new Spreadsheet();
        $uploadService = new UploadService();
        $exportService = new PdfExportService($spreadsheet, $uploadService);
        $filePath = $exportService->export($this->foods);

        ExportedFile::create([
            'file_path' => $filePath,
            'status' => 'completed'
        ]);
    }
}
