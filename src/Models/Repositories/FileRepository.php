<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Models\Entities\File;

class FileRepository extends BaseRepository
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->content = $this->parseFile();
    }

    /**
     * @return ArrayListInterface
     */
    protected function parseFile(): ArrayListInterface
    {
        $collection = new NaiveArrayList();
        $file = new File();
        $mime = mime_content_type($this->path);
        $file->setMime($mime);
        $file->setSize(filesize($this->path));
        $file->setFilename(basename($this->path));
        if (in_array($mime, $this->contentMime)) {
            if (!in_array(basename($this->path), $this->reservedNames)) {
                ob_start();
                include $this->path;
                $html = ob_get_clean();
                $file->setFileContent($html);
            }
        } else {
            if (!in_array(basename($this->path), $this->reservedNames)) {
                $file->setFileContent($this->path);
            }
        }
        $collection->add($file);
        return $collection;
    }
}
