<?php

namespace App\Services\FoodExport;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

abstract class ExportService
{
    /**
     * @var Spreadsheet
     */
    protected Spreadsheet $spreadsheet;

    /**
     * @param Spreadsheet $spreadsheet
     * @param UploadService $uploadService
     */
    public function __construct(Spreadsheet $spreadsheet, public UploadService $uploadService)
    {
        $this->spreadsheet = $spreadsheet;
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @return mixed
     */
    abstract public function createWriter(Spreadsheet $spreadsheet): mixed;

    /**
     * @return string
     */
    abstract public function createFileType(): string;

    /**
     * @param Collection $foods
     * @return string
     */
    public function export(Collection $foods): string
    {
        $spreadsheet = $this->createDocument($foods);
        $date = date('d-m-Y');
        $fileType = $this->createFileType();
        $fileName = "foods.{$date}.{$fileType}";

        return $this->saveAs($spreadsheet, $fileName);
    }

    /**
     * @param Collection $foods
     * @return Spreadsheet
     */
    public function createDocument(Collection $foods): Spreadsheet
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet = $this->setHeader($sheet);
        $sheet = $this->setValues($sheet, $foods);

        return $this->spreadsheet;
    }

    /**
     * @param $sheet
     * @return mixed
     */
    public function setHeader($sheet): mixed
    {
        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1', 'Список актуальных товаров');

        $sheet->setCellValue('A2', '№');
        $sheet->setCellValue('B2', 'ID');
        $sheet->setCellValue('C2', 'NAME');
        $sheet->setCellValue('D2', 'CATEGORY_ID');
        $sheet->setCellValue('E2', 'PRICE');
        $sheet->setCellValue('F2', 'DESCRIPTION');

        return $sheet;
    }

    /**
     * @param $sheet
     * @param Collection $foods
     * @return mixed
     */
    public function setValues($sheet, Collection $foods): mixed
    {
        $currentRow = $sheet->getHighestRow() + 1;
        for ($i = 1; $i <= count($foods); $i++) {
            $sheet->setCellValue('A' . $currentRow, $i);
            $sheet->setCellValue('B' . $currentRow, $foods[$i-1]->getId());
            $sheet->setCellValue('C' . $currentRow, $foods[$i-1]->getName());
            $sheet->setCellValue('D' . $currentRow, $foods[$i-1]->getCategoryId());
            $sheet->setCellValue('E' . $currentRow, $foods[$i-1]->getPrice());
            $sheet->setCellValue('F' . $currentRow, $foods[$i-1]->getDescription());

            $currentRow++;
        }

        return $sheet;
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @param string $fileName
     * @return string
     */
    public function saveAs(Spreadsheet $spreadsheet, string $fileName): string
    {
        $writer = $this->createWriter($spreadsheet);
        $filePath = storage_path("app/public/foods/$fileName");
        $writer->save($filePath);

//        $url = asset("storage/foods/$fileName");
        $url = "http://localhost:8080/storage/foods/$fileName";
        $this->uploadService->create($url, $fileName);

        return $filePath;
    }
}
