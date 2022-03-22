<?php

trait TSingletone
{
    private static $instance;

    //Метод получения экземпляра класса
    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}