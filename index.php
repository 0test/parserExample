<?php
require __DIR__ . "/vendor/autoload.php";

use Andre\Parser\App;
use Andre\Parser\Exporters\Csv;
use Andre\Parser\Exporters\Vardump;
use Andre\Parser\Exporters\XLSX;
use Andre\Parser\Extractors\SampleExtractor;
use Andre\Parser\Importers\Html;

$url = 'https://evocms.ru/';


$app = new App();

$importer = new Html();
$exporter = new Vardump();
$extractor = new SampleExtractor();

$res = $app
    ->fetch($importer, $url)    // получить документ
    ->extract($extractor)       //  выделить данные
    ->export($exporter, null);  //  куда-то экспортировать
