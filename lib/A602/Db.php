<?php
class A602_Db {

  static public function connect() {
    // if $_ENV["DATABASE_URL"] is empty then the app is not running on Heroku
    if (empty($_ENV["DATABASE_URL"])) {
      //TODO
      throw new Exception('DATABASE_URL is not set');
    }
    else {
      $url = parse_url($_ENV["DATABASE_URL"]);
      $config = 
	array('host'     => $url['host'],
	      'username' => $url['user'],
	      'password' => $url['pass'],
	      'dbname'   => trim($url["path"], "/"),
	      'charset'  => 'utf8');
      $db = Zend_Db::factory('Pdo_Pgsql', $config);

      return $db;
    }

  }
}