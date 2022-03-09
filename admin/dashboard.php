<?php


session_start();

include("../header.php");

require_once('../assets/helper.php');

redirectIfNotAdmin(); ?>
<main>

  <h2>Tableaux de bord</h2>

  <ul>
    <li>Liste des actions : </li>
    <li><a href="./lisPlayer/playerList.php">Liste des joueurs</a></li>
    <li><a href="./addPlayer/addPlayer.php">Ajouter un joueur</a></li>
  </ul>

</main>
<?php
include('../footer.php');
?>