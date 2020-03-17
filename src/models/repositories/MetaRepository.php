<?php
namespace tvitas\SiteRepo\Models\Repositories;
use tvitas\SiteRepo\Models\Repositories\BaseRepository;
use tvitas\SiteRepo\Models\Entities\Meta;
use tvitas\SiteRepo\Collections\NaiveArrayList;

class MetaRepository extends BaseRepository
{
    public function init()
    {
        $this->content = $this->metaInfo();
    }

    public function get()
    {
        return $this->content;
    }

    protected function metaInfo()
    {
        $triggerMime = false;
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
                    //$meta = $this->fill($meta, $info);
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
