<?php

namespace Andre\Parser\Exporters;

use Andre\Parser\Interface\Exporter;

/**
 * export data to csv
 */
class Csv implements Exporter
{
    public function save($data, $file)
    {
        $file = fopen($file, 'w');
        fputcsv($file, $data);
        fclose($file);
        return $this;
    }
}
