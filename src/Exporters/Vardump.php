<?php 

namespace Andre\Parser\Exporters;

use Andre\Parser\Interface\Exporter;

/**
 * export data to var_dump =)
 */
class Vardump implements Exporter{
    public function save($data, $file = null){
        var_dump($data);
        return $this;
    }
}