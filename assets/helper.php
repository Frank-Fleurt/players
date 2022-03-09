<?php

function getPosts()
{
  $db = 'mysql:host=127.0.0.1;dbname=rugby_player';
  $db_user = "root";
  $db_pwd = "";

  // try to connect to my DB and if error return it to my back page.
  try {
    // Connexion to DB
    $DBconnect = new PDO($db, $db_user, $db_pwd);
    // $DBconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException) {
    header('Location: ../index.php?code=1');
  }

  $req = 'SELECT `name` FROM `post`';
  $result = $DBconnect->query($req);
  return $result;
}
