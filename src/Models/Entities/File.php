<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\FileEntityInterface;

final class File implements EntityInterface, FileEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'mime',
        'size',
        'filename',
        'fileContent',
        'origin',
    ];

    /** @var int|null */
    private ?int $order;

    /** @var string|null */
    private ?string $origin;

    /** @var string|null */
    private ?string $mime;

    /** @var int|null */
    private ?int $size;

    /** @var string|null */
    private ?string $filename;

    /** @var string|null */
    private ?string $fileContent;

    /**
     * @return array|string[]|null
     */
    public function fillable(): ?array
    {
        return $this->fillable;
    }

    /**
     * @param string $origin
     * @return void
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param int $order
     * @return void
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param string $mime
     * @return void
     */
    public function setMime(string $mime): void
    {
        $this->mime = $mime;
    }

    /**
     * @return string|null
     */
    public function getMime(): ?string
    {
        return $this->mime;
    }

    /**
     * @param int|false $size
     * @return void
     */
    public function setSize(int|false $size): void
    {
        $this->size = false === $size ? null : $size;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param string $filename
     * @return void
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string $fileContent
     * @return void
     */
    public function setFileContent(string $fileContent): void
    {
        $this->fileContent = $fileContent;
    }

    /**
     * @return string|null
     */
    public function getFileContent(): ?string
    {
        return $this->fileContent;
    }
}
