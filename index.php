<?php

if (isset($_POST['username']) && isset($_POST['password'])) {

  if (
    $_POST['username'] == 'admin' &&
    $_POST['password'] == 'admin'
  ) {
    $_SESSION['isAdmin'] = true;
    header("Location: ./admin/dashboard.php");
  } else {
    $error = "Votre identifiant ou mot de passe est incorrect";
  }
}

include('header.php'); ?>
<main>
  <span>
    Merci de vous connectez avec vos identifiants administateurs grace au formulaire suivant.
  </span>

  <form action="" method="POST">
    <label for="username">Login</label>
    <input type="text" name="username" placeholder="Votre pseudo" />
    <label for="password">Mot de passe</label>
    <input type="password" name="password" placeholder="votre mot de passe" />
    <input type="submit" value="Se connecter" id="submitBtn" />
  </form>
</main>