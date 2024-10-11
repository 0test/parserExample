<?php

namespace Andre\Parser\Extractors;

use Andre\Parser\Interface\Extractor;

/**
 * Разбираем выгрузку
 * инфоблока из Битрикса
 * на примере файла /souces/news.xml
 */
class BitrixNewsExtractor implements Extractor
{

    protected $result;

    public function extract($data)
    {
        $array = [];
        foreach ($data->Каталог->Товары->Товар as $item) {
            $array[] = $this->parseOneNews($item);
        }
        $this->result = $array;

        return $this;
    }

    public function get()
    {
        return $this->result;
    }

    /**
     * допишем функцию для разбора
     * каждого конкретного элемента
     */
    private function parseOneNews($item)
    {
        // Собираем данные
        $category = [
            'bitrix_id' => (string) $item->Ид,
            'pagetitle' => (string) $item->Наименование,
            'props' => [],
        ];

        /**
         *  Парсим свойства.
         * Значения и подписи у битры
         * находятся в разных массивах
         * 
         */
        foreach ($item->ЗначенияСвойств->ЗначенияСвойства as $property) {

            $propertyId = (string) $property->Ид;
            $value = (string) $property->Значение;

            /**
             * Какое-то свойство может
             * потребовать ручного разбора на составляющие.
             * Скажем, в Битрикс галерея лежит
             * в свойстве с ID=47.
             * Эти картинки нужно будет закинуть 
             * в мультиТВ с названием news_slider_images
             * 
             */
            if ($propertyId == 47) {
                $result = [
                    "fieldValue" => [],
                    "fieldSettings" => ["autoincrement" => 1]
                ];
                foreach ($property->ЗначениеСвойства as $value) {

                    $key =   (string)$value->Значение;
                    $val = (string)$value->Описание;
                    // Добавляем в массив результат
                    $result['fieldValue'][] = [
                        "image" => 'assets/images/' .  $key,
                        'thumb' => '',
                        "alt" => $val,
                    ];
                }
                $jsonResult = json_encode($result, JSON_UNESCAPED_UNICODE);
                $category['props']['news_slider_images'] = $jsonResult;
            }
            /**
             * А можно просто заменить некое значение
             * на нужное для Эво.
             * Проверим статус публикации в Битрикс(CML2_ACTIVE) 
             * и отдадим 0/1 в published
             */
            elseif ($propertyId == 'CML2_ACTIVE') {
                $category['props']['published'] =
                    filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }
            /**
             * Если свойств много,
             * можно воспользоваться switch case
             */
            else {
                $category['props'][$propertyId] = trim($value);
            }
        }
        return $category;
    }
}
