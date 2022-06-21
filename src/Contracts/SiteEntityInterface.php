<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface SiteEntityInterface
{
    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $slogan
     * @return void
     */
    public function setSlogan(string $slogan): void;

    /**
     * @return string
     */
    public function getSlogan(): string;

    /**
     * @param string $acronym
     * @return void
     */
    public function setAcronym(string $acronym): void;

    /**
     * @return string
     */
    public function getAcronym(): string;
}
