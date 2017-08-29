<?php 

/**
 * 单例模式
 **/

 class Preferences 
 {
    private $props = array();
    private static $instance;

    private function __construct(){
    }
    
    public static function getInstance(){

      if (empty(self::$instance)){
          self::$instance = new Preferences();
      }
      return self::$instance;
    }

    public function setProperty($key,$val){

      $this->props[$key] = $val;

    }

    public function getProperty($key){

      return $this->props[$key];

    }
 
}
//调用单例
  $pref = Preferences::getInstance();
  $pref->setProperty('name','cjhlfy');
  $pref2 = Preferences::getInstance();
  echo $pref2->getProperty('name'); //name的属性值不会丢失,因为实例引用$instance是静态属性