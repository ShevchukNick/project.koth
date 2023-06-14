<?php

namespace koth;

class Registry
{
    // чтобы не писать код каждый раз просто используем трейт
    use TSingleton;

    protected static array $properties = [];

    // записываемв контейнер : свойство + значение
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    // берем свойство по названию, а если его нет то возвращаеися налл
    public function getProperty($name)
    {
        return self::$properties[$name] ?? null;
    }

    public function getProperties()
    {
        return self::$properties;
    }

    //контейнер готов, и теперь запишем его в свойство апп в классе Апп
}