<?php

namespace App\Services\FoodExport;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XlsxExportService extends ExportService
{
    /**
     * @return string
     */
    public function createFileType(): string
    {
        return 'xlsx';
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @return Xlsx
     */
    public function createWriter(Spreadsheet $spreadsheet): Xlsx
    {
        return new Xlsx($spreadsheet);
    }
}
