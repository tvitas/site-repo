<?php
namespace tvitas\SiteRepo\Models\Repositories;
use tvitas\SiteRepo\Models\Repositories\BaseRepository;

class DirectoryRepository extends BaseRepository
{
    public function init()
    {
        $this->content = $this->parseDir();
    }

    public function get()
    {
        return $this->content;
    }

    // Alias for get()
    public function files()
    {
        return $this->content;
    }
}
