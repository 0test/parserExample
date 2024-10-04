<?php

namespace Andre\Parser\Interface;

/**
 * Интерфейс-подсказка классов
 * импорта данных из внешнего источника
 */
interface Importer
{
    /**
     * Загружает данные по переданному URL.
     *
     * @param string $url URL для загрузки данных
     * @return self
     */
    public function fetch($url);

    /**
     * Возвращает загруженные данные.
     *
     * @return mixed Данные, полученные в процессе импорта
     */
    public function get();
}
