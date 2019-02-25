<?php

class Singleton {
  // static variable
  private static $object = null;

  // new will not work
  private function __construct() {

  }

  public static function getInstance() {
    if(self::$object == null) {
      self::$object = new self();
    }
    return self::$object;
  }
}