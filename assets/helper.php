<?php

function redirectIfNotAdmin()
{
  if (!isset($_SESSION['isAdmin'])) {
    header("Location: /players/index.php");
    exit;
  }
}

function DBConnect()
{
  $db = 'mysql:host=127.0.0.1;dbname=rugby_player';
  $db_user = "root";
  $db_pwd = "";
  // try to connect to my DB and if error return it to my back page.
  try {
    // Connexion to DB
    $DBconnect = new PDO($db, $db_user, $db_pwd);
    return $DBconnect;
    // $DBconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException) {
    header('Location: ../index.php?code=1');
  }
}


function getPosts()
{
  $DBconnect = DBConnect();
  $req = 'SELECT name FROM post';
  $data = $DBconnect->query($req)->fetchAll(PDO::FETCH_ASSOC);
  return $data;
}

function getPostsById($id)
{
  $DBconnect = DBConnect();
  $req = 'SELECT name FROM post WHERE id =' . $id;
  $data = $DBconnect->query($req)->fetchAll(PDO::FETCH_ASSOC);
  return $data;
}

function getPlayers()
{
  $DBconnect = DBConnect();
  $req = 'SELECT * FROM players';
  $data = $DBconnect->query($req)->fetchAll(PDO::FETCH_ASSOC);
  return $data;
}
