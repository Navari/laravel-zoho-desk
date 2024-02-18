<?php

namespace Navari\ZohoDesk\Entities;

use ReflectionClass;
use ReflectionNamedType;

class BaseEntity
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }

    public static function fromArray(array $data): self
    {
        return new self(...$data);
    }

    /**
     * @throws \JsonException
     */
    public static function fromJson(string $json): self
    {
        return self::fromArray(json_decode($json, true, 512, JSON_THROW_ON_ERROR));
    }

    /**
     * @throws \ReflectionException
     */
    public function __construct(...$args)
    {
        foreach ($args as $key => $value) {
            // if value is array and class has a property with the same name
            if (is_array($value) && property_exists($this, $key)) {
                $this->{$key} = $this->createObject($key, $value);
            } else {
                $this->{$key} = $value;
            }

        }
    }

    public function __get($name)
    {
        return $this->{$name};
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __isset($name)
    {
        return isset($this->{$name});
    }

    public function __unset($name)
    {
        unset($this->{$name});
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function __invoke(): array
    {
        return $this->toArray();
    }

    public function __debugInfo()
    {
        return $this->toArray();
    }

    public function __serialize(): array
    {
        return $this->toArray();
    }

    public function __unserialize(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @throws \ReflectionException
     */
    private function createObject(int|string $key, array $value)
    {
        $class = new ReflectionClass($this);
        $property = $class->getProperty($key);
        $type = $property->getType();

        if ($type instanceof ReflectionNamedType && $type->isBuiltin()) {
            return $value;
        }

        if ($type instanceof ReflectionNamedType) {
            $className = $type->getName();
            if (is_subclass_of($className, __CLASS__)) {
                return new $className(...$value);
            }
        }

        return $value;
    }
}
