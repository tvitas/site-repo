<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class User implements EntityInterface
{
    private $fillable = [
        'name',
        'email',
        'password',
        'role',
        'description',
    ];

    private $name;

    private $email;

    private $password;

    private $role;

    private $description;

    public function fillable()
    {
        return $this->fillable;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
