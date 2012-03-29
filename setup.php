<?php

require_once(__DIR__ . '/lib/boot.inc.php');

if ($db = A602_Db::connect()) {
  /* $query = "DROP TABLE IF EXISTS pictures"; */

  $query = "CREATE TABLE IF NOT EXISTS pictures (
                id BIGINT PRIMARY KEY,
                url VARCHAR(255),
                name VARCHAR (100),
                event_id BIGINT,
                created DATE DEFAULT (datetime('now','localtime'))
            )";
  try {
    $db->query($sql1);
    print "setup complete";
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}


