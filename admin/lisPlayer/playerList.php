<?php


session_start();

include("../../header.php");

require_once('../../assets/helper.php');

redirectIfNotAdmin();
$players = getPlayers();
// var_dump($players)
?>

<main>

  <div class="playersContainer">

    <?php
    foreach ($players as $player_key => $player) {
      // var_dump($player);
    ?>
      <div class="playerCard">
        <h3><?= $player['firstName'], ' ', $player['lastName'] ?></h3>
        <h4><?= $player['age'], '', getPostsById($player['post']) ?></h4>
        <!-- Je me suis arreter la le 09/03/22 j'ai encore du mal a aller chercher un élément précis dans ma BDD -->
      </div>
    <?php
    }
    ?>
  </div>
</main>