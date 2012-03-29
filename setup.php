<?php

require_once(__DIR__ . '/lib/boot.inc.php');

if ($db = A602_Db::connect()) {
  /* $query = "DROP TABLE IF EXISTS pictures"; */

  $sql = "CREATE TABLE pictures (
                id BIGINT PRIMARY KEY,
                url VARCHAR(255),
                name VARCHAR (100),
                event_id BIGINT,
                created_at TIMESTAMP DEFAULT current_time
            )";
  try {
    $db->query($sql);
    print "setup complete";
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}



