<?php

namespace tvitas\SiteRepo\Traits;

trait MethodResolverTrait
{
    public function resolveMethodAndProperty($member, $object)
    {
        if (false === is_object($object)) {
            return "";
        }

        $reflection = new \ReflectionClass($object);
        $properties = $reflection->getProperties();
        $methods = $reflection->getMethods();
        $triggerFoundMember = false;
        $triggerFoundGetter = false;
        $getter = 'get' . ucfirst(strtolower($member));
        foreach ($properties as $property) {
            if ($member === $property->name) {
                $triggerFoundMember = true;
                break;
            }
        }

        foreach ($methods as $method) {
            if ($getter === $method->name) {
                $triggerFoundGetter = true;
                break;
            }
        }
        return ($triggerFoundMember and $triggerFoundGetter) ? $getter : "";
    }
}
