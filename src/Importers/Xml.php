<?php

namespace Andre\Parser\Importers;

use Andre\Parser\Interface\Importer;
 
/**
 * Импорт xml
 */
class Xml implements Importer
{
    protected $document;

    public function fetch($url)
    {
        $this->document = simplexml_load_file($url);
        return $this;
    }
    public function get()
    {
        return $this->document;
    }
}
