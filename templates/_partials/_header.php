<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta
    http-equiv="X-UA-Compatible"
    content="IE=edge">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

  <!-- ------------------------------------------------------------- FAVICON -->
  <link
    rel="icon"
    type="image/x-icon"
    href="/assets/images/favicons/favicon.ico">

  <!-- ----------------------------------------------------------------- CEO -->
  <meta
    name="description"
    content="Le garage V.Parrot vous accueille à Toulouse 6 jours sur 7 et propose ses 15 années
  d'expertise dans la réparation et l'entretien de votre véhicule." />

  <!-- -------------------------------------------------------------- STYLES -->
  <!-- SLICK CSS -->
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/js/slick-1.8.1/slick/slick.css" />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/js/slick-1.8.1/slick/slick-theme.css" />

  <!-- CUSTOM CSS -->
  <!-- PAGE SPECEFIC CSS -->
  <link rel="stylesheet" href="/assets/css/styles.css">
  <title><?= $title ?? 'Garage Automobile Vincent Parrot'; ?></title>
</head>

<body>
  <header class="<?= isset($home) && $home ? 'home' : ''; ?>">
    <div class="container">
      <div class="row">
        <a href="/" class="logo-parrot">
          <img src="/assets/images/pictures/v_parrot_logo.png" alt="logo Vincent Parrot garage">
          <p>V.PARROT <br> automobile</p>
        </a>
        <nav class="header-nav hidden">
          <ul>
            <li>
              <a href="/" class="header-nav-link">
                <p>Accueil</p>
              </a>
            </li>
            <li>
              <a href="/nos-vehicules" class="header-nav-link">
                <p>Occasions</p>
              </a>
            </li>
            <li>
              <a href="/nous-contacter" class="header-nav-link">
                <p>Contact</p>
              </a>
            </li>
          </ul>

        </nav>
        <button type="button" class="menu">
          <?php require_once 'assets/images/icons/menu.svg'; ?>
        </button>
      </div>
    </div>
  </header>

  <?php if (isset($flashes)) {
    include_once ROOT_DIR . 'templates/_partials/_flashes.php';
  } ?>

  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>