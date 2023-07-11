<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<?php require_once 'lib/workshop_datas.php'; ?>
<?php require_once 'lib/users.php'; ?>

<!-- PAGE NAME -->
<?php $current_page = 'login'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ----------------------------------------------------------------- CEO -->
  <meta name="description" content="Le garage V.Parrot vous accueille à Toulouse 6 jours sur 7 15 annnées d'expertise dans la réparation et l'entretien de votre véhicule" />

  <!-- -------------------------------------------------------------- STYLES -->
  <!-- SLICK CSS -->
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/js/slick-1.8.1/slick/slick-theme.css" />

  <!-- CUSTOM CSS -->
  <!-- PAGE SPECEFIC CSS -->
  <link rel="stylesheet" href="/assets/css/index.css">
  <link rel="stylesheet" href="/assets/css/<?php echo $current_page ?>.css">
  <title>Garage Vincent Parrot</title>
</head>

<body>
  <!------------------------------------------------------------ HEADER START-->
  <header>
    <div class="container">
      <div class="row">
        <a href="http://localhost:8888/index.php" class="logo-parrot">
          <img src="http://localhost:8888/assets/images/pictures/v_parrot_logo.png" alt="logo Vincent Parrot garage">
          <p>V.PARROT <br> automobile</p>
          <!-- <p>Mécanique</p> -->
        </a>
        <button type="button" class="menu">
          <img src="assets/images/icons/menu.svg" alt="burger menu icon">
        </button>
      </div>
    </div>
  </header>
  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>
    <section id="section-1">
      <div class="container">
        <div class="row">
          <h1>Connexion</h1>
          <form action="admin.php" method="post">
            <label for="email">
              <input type="email" name="email" id="email" placeholder="Votre email" required>
            </label>
            <label for="password">
              <input type="password" name="password" id="password" required>
            </label>
            <label for="passord_memory" class="tos">
              <input type="checkbox" id="TOpassord_memoryS" name="passord_memory">
              Mémorier la connexion
            </label>
            <input class="button" type="submit" value="Se connecter">
          </form>
        </div>
      </div>
    </section>
<?php require_once 'templates/footer.php'; ?>