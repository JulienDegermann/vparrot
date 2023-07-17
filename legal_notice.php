<?php
$current_page = 'legal_notice';
$current_pageFR = 'mentions légales';
require_once 'templates/header.php';
require_once 'lib/workshop_datas.php';
require_once 'lib/users.php';
?>
<section>
    <div class="container">
        <div class="row">
            <h1>Mentions légales</h1>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <h2>Informations générales</h2>
            <p>Nom de l'entreprise : <?= $address_input['name']; ?></p>
            <p>Adresse : <br>
                <?= address($address_input); ?>
            </p>
            <p>Téléphone : <?= $phone; ?></p>
            <p>Email : <?= $email; ?></p>
            <p>Responsable de la publication : <?= $users['admin']['first_name'] . ' ' . $users['admin']['last_name']; ?></p>
            <p>Nom de l'hébergeur : MAMP</p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <h2>Propriété intellectuelle</h2>
            <p>Tous les contenus présents sur ce site sont protégés par le droit d'auteur. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <h2>Liens externes</h2>
            <p>Ce site peut contenir des liens vers des sites externes. Nous ne sommes pas responsables du contenu de ces sites.</p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">

            <h2>Collecte des données personnelles</h2>
            <p>Nous collectons des données personnelles uniquement dans le cadre de la fourniture de nos services. Les données collectées ne seront pas transmises à des tiers sans votre consentement.</p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <h2>Cookies</h2>
            <p>Ce site utilise des cookies pour améliorer l'expérience utilisateur. En utilisant ce site, vous acceptez l'utilisation de cookies.</p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <h2>Modification des mentions légales</h2>
            <p>Nous nous réservons le droit de modifier les présentes mentions légales à tout moment, veuillez consulter cette page régulièrement.</p>
        </div>
    </div>
</section>

<?php require_once 'templates/footer.php'; ?>