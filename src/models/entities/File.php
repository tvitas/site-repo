<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class File implements EntityInterface
{
    private $fillable = [
        'mime',
        'size',
        'filename',
        'fileContent',
    ];

    private $order;

	private $mime;

	private $size;

	private $filename;

	private $fileContent;

    public function fillable()
    {
        return $this->fillable;
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
