<?php
namespace tvitas\SiteRepo\Contracts;

interface UserEntityInterface
{
    public function setName($name);
    public function getName();
    public function setEmail($email);
    public function getEmail();
    public function setPassword($password);
    public function getPassword();
    public function setRole($role);
    public function getRole();
    public function setDescription($description);
    public function getDescription();
}
