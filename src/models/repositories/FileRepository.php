<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Models\Repositories\BaseRepository;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Models\Entities\File;

class FileRepository extends BaseRepository
{
    public function init()
    {
        $this->content = $this->parseFile();
    }

    protected function parseFile()
    {
        $collection = new NaiveArrayList();
        $file = new File();
        $mime = mime_content_type($this->path);
        $file->setMime($mime);
        $file->setSize(filesize($this->path));
        $file->setFilename(basename($this->path));
        switch ($mime)
        {
            case 'text/html':
            case 'text/plain':
            {
                if (!in_array($this->path, $this->reservedNames)) {
                    ob_start();
                    include $this->path;
                    $html = ob_get_clean();
                    $file->setFileContent($html);
                }
                break;
            }
            default:
            {
                $file->setFileContent($this->path);
                break;
            }
        }
        $collection->add($file);
        return $collection;
    }
}
