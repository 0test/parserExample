<?php

namespace Andre\Parser\Interface;

/**
 * Интерфейс-подсказка
 * для экстракторов данных
 */
interface Extractor
{
    /**
     * Извлекает данные из переданного источника.
     *
     * @param mixed $data Исходные данные для извлечения
     * @return self
     */
    public function extract($data);
    /**
     * Возвращает результат после обработки данных.
     *
     * @return mixed Результат извлечения
     */
    public function get();
}
