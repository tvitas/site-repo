<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface FileEntityInterface
{

    /**
     * @param string $origin
     * @return void
     */
    public function setOrigin(string $origin): void;

    /**
     * @return string|null
     */
    public function getOrigin(): ?string;

    /**
     * @param int $order
     * @return void
     */
    public function setOrder(int $order): void;

    /**
     * @return int|null
     */
    public function getOrder(): ?int;

    /**
     * @param string $mime
     * @return void
     */
    public function setMime(string $mime): void;

    /**
     * @return string|null
     */
    public function getMime(): ?string;

    /**
     * @param int|false $size
     * @return void
     */
    public function setSize(int|false $size): void;

    /**
     * @return int|null
     */
    public function getSize(): ?int;

    /**
     * @param string $filename
     * @return void
     */
    public function setFilename(string $filename): void;

    /**
     * @return string|null
     */
    public function getFilename(): ?string;

    /**
     * @param string $fileContent
     * @return void
     */
    public function setFileContent(string $fileContent): void;

    /**
     * @return string|null
     */
    public function getFileContent(): ?string;
}
