<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Models\Repositories\BaseRepository;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Models\Entities\File;

class DirectoryRepository extends BaseRepository
{
    public function init()
    {
        $this->content = $this->parseDir();
    }

    protected function parseDir()
    {
        $files = array_values(array_diff(scandir($this->path), ['.', '..']));
        $files = array_filter($files,
            function($item)
            {
                $mime = mime_content_type($this->path . '/' . $item);
                return ((is_file($this->path . '/' . $item))
                    and (in_array($mime, $this->contentMime))
                    and (!in_array($item, $this->reservedNames)));
            }
        );
        $collection = new NaiveArrayList();
        array_walk($files,
            function($item) use (&$collection) {
                $query = "//*/file[@name='$item']/order";
                $infos = $this->xpathQuery($this->path, $query);
                $order = (!empty($infos)) ? (int) sprintf('%s', $infos[0]) : 0;
                $file = new File();
                $file->setOrder($order);
                $file->setMime(mime_content_type($this->path . '/' . $item));
                $file->setSize(filesize($this->path . '/' . $item));
                $file->setFilename(basename($this->path . '/' . $item));
                ob_start();
                include $this->path . '/' . $item;
                $html = ob_get_clean();
                $file->setFileContent($html);
                $collection->add($file);
            }
        );
        return $collection;
    }
}
