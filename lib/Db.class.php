<?php
class Db {

  static public function connect() {
    // if $_ENV["DATABASE_URL"] is empty then the app is not running on Heroku
    if (empty($_ENV["DATABASE_URL"])) {
      $config["db"]["driver"] = "sqlite";
      $config["db"]["url"] = "sqlite://" . realpath("data/my.db");
    }
    else {
      // translate the database URL to a PDO-friendly DSN
      $url = parse_url($_ENV["DATABASE_URL"]);
      $config["db"]["driver"] = $url["scheme"];
      $config["db"]["url"] = sprintf(
				     "pgsql:user=%s;password=%s;host=%s;dbname=%s",
				     $url["user"], $url["pass"], $url["host"],
				     trim($url["path"], "/"));
    }
  }
}