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
        <nav class="header-nav hidden">
          <ul>
            <li>
              <a href="http://localhost:8888/index.php" class="header-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                  <path d="M220-180h150v-250h220v250h150v-390L480-765 220-570v390Zm-60 60v-480l320-240 320 240v480H530v-250H430v250H160Zm320-353Z" />
                </svg>
                <p>Accueil</p>
              </a>
            </li>
            <!-- <li class="none">
              <a href="http://localhost:8888/workshop.php" class="header-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                  <path d="M705-128 447-388q-23 8-46 13t-47 5q-97.083 0-165.042-67.667Q121-505.333 121-602q0-31 8.158-60.388Q137.316-691.777 152-718l145 145 92-86-149-149q25.915-15.158 54.957-23.579Q324-840 354-840q99.167 0 168.583 69.417Q592-701.167 592-602q0 24-5 47t-13 46l259 258q11 10.957 11 26.478Q844-209 833-198l-76 70q-10.696 11-25.848 11T705-128Zm28-57 40-40-273-273q16-21 24-49.5t8-54.5q0-75-55.5-127T350-782l101 103q9 9 9 22t-9 22L319-511q-9 9-22 9t-22-9l-97-96q3 77 54.668 127T354-430q25 0 53-8t49-24l277 277ZM476-484Z" />
                </svg>
                <p>Atelier</p>
              </a>
            </li> -->
            <li>
              <a href="http://localhost:8888/pages/used_cars.php" class="header-nav-link">
                <!-- <img src="assets/images/icons/car.svg" alt="car icon"> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                  <path d="M200-204v54q0 12.75-8.625 21.375T170-120h-20q-12.75 0-21.375-8.625T120-150v-324l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810-120h-21q-13 0-21-8.625T760-150v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309-314 324.5-329.75T340-368q0-23.333-15.75-39.667Q308.5-424 286-424q-23.333 0-39.667 16.265Q230-391.471 230-368.235 230-345 246.265-329.5q16.264 15.5 39.5 15.5ZM675-314q23.333 0 39.667-15.75Q731-345.5 731-368q0-23.333-16.265-39.667Q698.471-424 675.235-424 652-424 636.5-407.735q-15.5 16.264-15.5 39.5Q621-345 636.75-329.5T675-314Zm-495 50h600v-210H180v210Z" />
                </svg>
                <p>Occasions</p>
              </a>
            </li>
            <!-- <li>
              <a href="http://localhost:8888/pages/about.php" class="header-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                  <path d="M484-247q16 0 27-11t11-27q0-16-11-27t-27-11q-16 0-27 11t-11 27q0 16 11 27t27 11Zm-35-146h59q0-26 6.5-47.5T555-490q31-26 44-51t13-55q0-53-34.5-85T486-713q-49 0-86.5 24.5T345-621l53 20q11-28 33-43.5t52-15.5q34 0 55 18.5t21 47.5q0 22-13 41.5T508-512q-30 26-44.5 51.5T449-393Zm31 313q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z" />
                </svg>
                <p>A propos</p>
              </a>
            </li> -->
            <li>
              <a href="http://localhost:8888/pages/contact.php" class="header-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                  <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v53q0 56-39.5 94.5T744-294q-36 0-68-17.5T627-361q-26 34-65 50.5T480-294q-78 0-132.5-54T293-480q0-78 54.5-133T480-668q78 0 132.5 55T667-480v53q0 31 22.5 52t54.5 21q31 0 53.5-21t22.5-52v-53q0-142-99-241t-241-99q-142 0-241 99t-99 241q0 142 99 241t241 99h214v60H480Zm0-274q53 0 90-36.5t37-89.5q0-54-37-91t-90-37q-53 0-90 37t-37 91q0 53 37 89.5t90 36.5Z" />
                </svg>
                <p>Contact</p>
              </a>
            </li>
          </ul>
        </nav>
        <button type="button" class="menu">
          <img src="assets/images/icons/menu.svg" alt="burger menu icon">
        </button>
      </div>
    </div>
  </header>
  <!------------------------------------------------------------- HEADER END -->

  <!------------------------------------------------------------- MAIN START -->
  <main>