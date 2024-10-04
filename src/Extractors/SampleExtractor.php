<?php

namespace Andre\Parser\Extractors;

use Andre\Parser\Interface\Extractor;

/**
 * Пример экстрактора
 * Вытаскивает пару тегов,
 * отдаёт дальше
 * 
 */
class SampleExtractor implements Extractor
{

    protected $result;

    public function extract($data)
    {
        /**
         * выдёргиваем тайтл
         * и
         * ссылку на репозиторий
         * из 
         * https://evocms.ru/
         */
        $data = [
            'pagetitle' => $data->first('h1')->text(),
            'repository' => $data->first('.hero__download--main')->getAttribute('href')
        ];
        $this->result = $data;

        return $this;
    }

    public function get()
    {
        return $this->result;
    }
}
