<?php
require __DIR__ . "/vendor/autoload.php";

use Andre\Parser\App;
use Andre\Parser\Exporters\Csv;
use Andre\Parser\Exporters\Vardump;
use Andre\Parser\Exporters\XLSX;
use Andre\Parser\Extractors\BitrixNewsExtractor;
use Andre\Parser\Extractors\SampleHtmlExtractor;
use Andre\Parser\Extractors\SampleXmlExtractor;
use Andre\Parser\Importers\Html;
use Andre\Parser\Importers\Xml;

$app = new App();



/**
 * Пример получения
 * данных из html страницы
 * и вывод в консоли через
 * var_dump
 */
/*
$url = 'https://evocms.ru/';
$importer = new Html();
$exporter = new Vardump();
$extractor = new SampleHtmlExtractor();
$res = $app
    ->fetch($importer, $url)    // получить документ
    ->extract($extractor)       //  выделить данные
    ->export($exporter, null);  //  куда-то экспортировать
*/

/**
 * Пример получения
 * данных из xml-страницы
 * и сохранение в csv
 */
/*
$url = 'https://evocms.ru/sitemap.xml';
$importer = new Xml();
$extractor = new SampleXmlExtractor();
$exporter = new Csv();
$res = $app
    ->fetch($importer,$url)
    ->extract($extractor)
    ->export($exporter,'text.csv')
    ;
*/

/**
 * Пример разбора 
 * экспорт-файла новостей
 * из Битрикса
 */
$url = 'sources/news.xml';
$importer = new Xml();
$extractor = new BitrixNewsExtractor();
$exporter = new XLSX();// надо заменить на разбор Битры
$res = $app
    ->fetch($importer, $url)
    ->extract($extractor)
    ->export($exporter, 'text.xlsx');