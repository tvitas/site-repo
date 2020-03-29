<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\FileEntityInterface;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class File implements EntityInterface, FileEntityInterface
{
    private $fillable = [
        'mime',
        'size',
        'filename',
        'fileContent',
        'origin',
    ];

    private $order;

    private $origin;

    private $mime;

    private $size;

    private $filename;

    private $fileContent;


    public function fillable()
    {
        return $this->fillable;
    }

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setMime($mime)
    {
        $this->mime = $mime;
    }

    public function getMime()
    {
        return $this->mime;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFileContent($fileContent)
    {
        $this->fileContent = $fileContent;
    }

    public function getFileContent()
    {
        return $this->fileContent;
    }
}
