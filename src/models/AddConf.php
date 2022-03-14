<?php

namespace applibd\models;

class AddConf
{
  static  public function addConfig($file) {
      $db = new DB();
      $db->addConnection( parse_ini_file($file));
      $db->setAsGlobal();
      $db->bootEloquent();
  }
}