<?php

namespace App\Services\FoodExport;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class PdfExportService extends ExportService
{
    /**
     * @return string
     */
    public function createFileType(): string
    {
        return 'pdf';
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @return Mpdf
     */
    public function createWriter(Spreadsheet $spreadsheet): Mpdf
    {
        return new Mpdf($spreadsheet);
    }

}
