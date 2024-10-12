# parserExample
 Оболочка для парсинга (!alpha!)
 
 * `composer install`
 * Запуск из консоли `php index.php`

 # Docs
 Читаем index.php ну и комменты в коде

Пример получения списка страниц из файла sitemap.xml:

```php
$importer = new Xml();
$extractor = new SampleXmlExtractor();
$exporter = new Csv();
$url = 'https://evocms.ru/sitemap.xml';
$res = $app
    ->fetch($importer,$url)
    ->extract($extractor)
    ->export($exporter,'text.csv')
    ;
```
**Как работает?**

Импортёр - класс, который получает данные определённого формата и передаёт дальше. В примере это импортёр xml файла. На вход даётся ссылка/путь к файлу.

Импортёр должен имплементировать интерфейс `Andre\Parser\Interface\Importer;` и реализовать его методы.

---

Экстрактор - класс, который эти данные обрабатывает и отдаёт нужного *нам* вида массив/объект.
Экстрактор должен имплементировать интерфейс `Andre\Parser\Interface\Extractor;` и реализовать его методы.

---
Экспортёр - экспортирует данные в нужный формат. Это может быть var_dump, csv, xls или любой другой формат отображения. 
Экспортёр должен имплементировать интерфейс `Andre\Parser\Interface\Exporter;`

