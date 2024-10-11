<?php

namespace Andre\Parser\Extractors;

use Andre\Parser\Interface\Extractor;

/**
 * Пример экстрактора
 * Вытаскивает пару тегов,
 * отдаёт дальше
 * 
 */
class SampleXmlExtractor implements Extractor
{

    protected $result;

    public function extract($data)
    { 
        $array = [];
        foreach ($data->url as $key => $value) {
            $array[] = (string) $value->loc;
        }
        $this->result = $array;

        return $this;
    }

    public function get()
    {
        return $this->result;
    }
}
