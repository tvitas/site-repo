<?php
declare(strict_types=1);
namespace tvitas\SiteRepo\Traits;

trait XpathQueryTrait
{
    /**
     * @param string $dir
     * @param string $query
     * @return array|null
     */
    public function xpathQuery(string $dir, string $query): ?array
    {
        if (file_exists($dir . '/' . $this->metaInf)) {
            $xml = simplexml_load_file($dir . '/' . $this->metaInf);
            return $xml->xpath($query);
        }
        return [];
    }
}
