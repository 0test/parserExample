<?php

namespace Andre\Parser\Exporters;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Andre\Parser\Interface\Exporter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

use function PHPSTORM_META\type;

/**
 * export data to xlsx
 */
class XLSX implements Exporter
{
    public function save($data, $file)
    {
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $column = 1;
        foreach ($data as $item) {
            if (gettype($item) == 'string') {
                $worksheet->setCellValue('A' . $column, $item);
                $column++;
            }
            else{
                //  if array?
            }
        }
        $writer = new WriterXlsx($spreadsheet);
        $writer->save($file);
        return $this;
    }
}
