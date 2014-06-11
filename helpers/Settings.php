<?php

/**
  * Settings
  *
  * Very simple Settings class
  *
  * Last Update: 2014-06-12
  *
  * @author  Lucas Bares <luke@nehemedia.de>
  * @version 0.0.1
  * @package helpers
  */
class Settings {

    static $init  = false;

    static $settings = [];

    public static function init(){
        if(is_file(__DIR__.'/../config/'.App::environment().'/settings.php')){
        //if(0){ //used for debugging 
            self::importFromFile('/../config/'.App::environment().'/settings.php');
        }elseif(is_file(__DIR__.'/../config/settings.php')){
            self::importFromFile(__DIR__.'/../config/settings.php');
        }else{
            throw new Exception('No Settings file found.');
        }

        self::$init = true;
        return self;
    }

    public static function get($key){
        if(!self::$init) self::init();
        return self::$settings[$key];
    }

    public static function set($key, $value){
        if(!self::$init) self::init();
        self::$settings[$key] = $value;
    }

    protected static function importFromFile($filename){
        self::$settings = require $filename;
    }
}

?>