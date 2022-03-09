<?php
/*-----------------------------

Title : Player liste
author: Echiiro

-----------------------------*/

// --------------REQUIRES---------------
require_once('../assets/helper.php');

//Including header for a better code
include("../header.php");

// do a response message

$message = "";
$class = "";
if (isset($_GET['code'])) {
  switch ($_GET['code']) {
    case 0:
      $message = "Votre joueur a bien été enregistré.";
      $class = "ok";
      break;
    case 1:
      $message = "Votre joueur n'a as pue être enregistré suite a un problème de connexion.";
      $class = "error";

      break;
    case 2:
      $message = "Votre joueur n'a as pue être enregistré car un champ a mal été remplis";
      $class = "error";

      break;
    case 3:
      $message = "Veuillez remplir tout les champs ! ";
      $class = "error";

      break;
  }
}

// getting all post for a futur select

$posts = getPosts();


?>

<!-- Create a main for my app -->
<main>
  <span class="<?= $class ?>"><?= $message ?></span>
  <!-- Create a form fo implément table on my BDD -->
  <form action="traitement.php" method="POST">
    <!-- Input for each columns -->
    <label for="firstName">Prénom</label>
    <input type="text" name="firstName" id="firstName" required>

    <label for="lastName">Nom</label>
    <input type="text" name="lastName" id="lastName" required>

    <label for="age">Âge</label>
    <input type="text" name="age" id="age">

    <label for="try">Nombres d'essaie</label>
    <input type="text" name="try" id="try">

    <label for="post">Poste</label>
    <select name="post" id="post">
      <?php foreach ($posts as $key => $post) { ?>
        <option value="<?= $key ?>"><?= $post["name"] ?></option>
      <?php } ?>
    </select>

    <input type="submit" value="Créer ta table" id="submitBtn">
    <span class="legend"> * obligatoir</span>

  </form>
</main>

<?php
//Including footer for a better code
include("../footer.php");
?>