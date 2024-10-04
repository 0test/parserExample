<?php
namespace Andre\Parser\Interface;

/**
 * export data to any source
 */
interface Exporter{
    function save($data, $file);
}