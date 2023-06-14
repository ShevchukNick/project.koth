<?php

namespace koth;

trait TSingleton
{
    private static ?self $instance=null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        //если  инстанс есть -вернем егоЬ, если нет то в пустой статик инстанс запишем экземпляр класса
        return static::$instance ?? static::$instance=new static();
    }
}