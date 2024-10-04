<?php

namespace Andre\Parser\Importers;

use Andre\Parser\Interface\Importer;
use DiDom\Document;

/**
 * Импорт html страниц
 */
class Html implements Importer
{
    protected $document;

    public function fetch($url)
    {
        $this->document = new Document();
        $this->document->loadHtmlFile($url);
        return $this;
    }
    public function get()
    {
        return $this->document;
    }
}
