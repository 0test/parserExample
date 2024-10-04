<?php

namespace Andre\Parser;

use Andre\Parser\Interface\Exporter;
use Andre\Parser\Interface\Importer;


class App
{
    private $data;

    /**
     * Получить документ
     */
    public function fetch($importer, $url)
    {
        $this->data = $importer->fetch($url)->get();
        return $this;
    }


    /**
     * Извлечь из него данные
     */
    public function extract($extractor)
    {
        $this->data = $extractor->extract($this->data)->get();

        return $this;
    }


    /**
     * Экспортировать данные дальше
     */
    public function export(Exporter $class, $file)
    {
        $class->save($this->data, $file);
        return $this;
    }
}
