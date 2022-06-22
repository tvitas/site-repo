<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Models\Entities\Meta;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Contracts\ArrayListInterface;

class MetaRepository extends BaseRepository
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->content = $this->metaInfo();
    }

    protected function metaInfo(): ArrayListInterface
    {
        $triggerMime = false;
        $dirname = '';
        $query = '';
        $collection = new NaiveArrayList();
        if (is_file($this->path)) {
            $dirname = dirname($this->path);
            $filename = basename($this->path);
            if (in_array(mime_content_type($this->path), $this->contentMime)) {
                $triggerMime = true;
            }
            $query = "//*/file[@name='$filename']";
        }

        if (is_dir($this->path)) {
            $dirname = $this->path;
            $triggerMime = true;
            $query = "//*/dir";
        }

        if ($triggerMime) {
            $infos = $this->xpathQuery($dirname, $query);
            foreach ($infos as $info) {
                $meta = new Meta;
                $fillables = $meta->fillable();
                foreach ($fillables as $fillable) {
                    $setter = 'set' . ucfirst($fillable);
                    $meta->$setter(sprintf('%s', $info->$fillable));
                }
                $collection->add($meta);
            }
        }
        return $collection;
    }
}
