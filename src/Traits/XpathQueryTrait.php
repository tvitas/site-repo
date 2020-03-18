<?php
namespace tvitas\SiteRepo\Traits;

trait XpathQueryTrait
{
    public function xpathQuery($dir, $query)
    {
        if (file_exists($dir . '/' . $this->metaInf)) {
            $xml = simplexml_load_file($dir . '/' . $this->metaInf);
            $infos = $xml->xpath($query);
            return $infos;
        }
        return [];
    }
}
