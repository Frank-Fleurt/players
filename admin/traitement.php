<?php
// Calls to my dffrents needs pages.
require_once('./assets/secure.php');
// check if I got my $_POST
if (isset($_POST) && !empty($_POST)) {

  // Create my varaibles for my connexion
  $db = 'mysql:host=127.0.0.1;dbname=rugby_player';
  $db_user = "root";
  $db_pwd = "";

  // try to connect to my DB and if error return it to my back page.
  try {
    // Connexion to DB
    $DBconnect = new PDO($db, $db_user, $db_pwd);
    // $DBconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException) {
    header('Location: index.php?code=1');
  }

  // Secures my data

  // for ($i = 0; $i > 25; $i++) {
  //   var_dump($i);
  // }
  $data = [
    'firstName' => secure($_POST['firstName']),
    'lastName' => secure($_POST['lastName']),
    'age' => secure($_POST['age']),
    'post' => secure($_POST['post']),
    'try' => secure($_POST['try']),
  ];



  // Use my data to my sql injections

  // try to make request if error retunr to my back page
  try {

    // Prepare request
    $req = 'INSERT INTO players(firstName, lastName, age, post, try) VALUES(:firstName, :lastName, :age, :post, :try)';
    $req = $DBconnect->prepare($req);
    // Execute request 
    $req->execute($data);

    // return to my back page with good news
    echo "ok";
    // header('Location: index.php?code=0');
  } catch (PDOException $e) {
    // return my error code
    echo $e;
    // header('Location: index.php?code=2');
  }
} else {
  header('Location: index.php?code=3');
}
