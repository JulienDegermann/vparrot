<section class="mobile_only">
    <h1>ERREUR</h1>
    <p>Cette page est conçu pour être affichée sur un écran plus grand. Veuillez-vous connecter sur une tablette ou un ordinateur</p>
</section>
<section id="" class="desktop_only">
    <div class="container">
        <div class="row">
            <aside class="bloc-4">
                <nav class="admin-nav">
                    <!-- if is admin -> display admin functions -->
                    <?php if (true) { ?>
                        <ul class="admin">
                            <li id="garage" class="<?= $active === 'garage' ? 'active' : ''; ?>">Informations sur le garage</li>
                            <li id="employees" class="<?= $active === 'employees' ? 'active' : ''; ?>">Comptes employé</li>
                        </ul>
                    <?php } ?>
                    <ul>

                        <li id="messages" class="<?= $active === 'messages' ? 'active' : ''; ?>">Messages clients</li>
                        <li id="comments" class="<?= $active === 'comments' ? 'active' : ''; ?>">Commentaires clients</li>
                        <li id="cars" class="<?= $active === 'cars' ? 'active' : ''; ?>">Véhicules d'occasion</li>
                    </ul>
                </nav>
            </aside>
            <!-- garage -->
            <article class="bloc-3-4 garage <?= $active; ?>" id="display">
                <!-- ------------------------------------------- GARAGE INFORMATIONS -->

                <section class="garage">
                    <h1>Informations générales</h1>
                    <?php include_once __DIR__ . '/_partials/_admin_company_informations.php';
                    include_once __DIR__ . '/_partials/_admin_openings.php';
                    include_once __DIR__ . '/_partials/_admin_company_services.php';
                    ?>


                </section>
                <!-- --------------------------------------------------------------- -->

                <!-- --------------------------------------------- EMPLOYEES ACCOUNT -->
                <section class="employees">
                    <h1>Comptes employés</h1>
                    <div>
                        <h2>Créer un compte employé</h2>
                        <form action="/admin" method="post">
                            <fieldset>
                                <label for="employee_first_name">*Prénom :
                                    <input type="text" name="employee_first_name" id="employee_first_name" required>
                                </label>
                                <label for="employee_last_name">*Nom :
                                    <input type="text" name="employee_last_name" id="employee_last_name" required>
                                </label>
                                <label for="employee_phone">Téléphone :
                                    <input type="text" name="employee_phone" id="employee_phone">
                                </label>
                            </fieldset>
                            <p class="requirements">
                                * : champs obligatoires
                            </p>
                            <input class="button" type="submit" value="Enregistrer" name="new_employee">
                        </form>

                    </div>
                    <div>
                        <h2>Liste des employés</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th class="desktop_only">E-mail</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($employees as $employee) { ?>
                                    <tr>
                                        <td>
                                            <?= $employee->getLastName(); ?>
                                        </td>
                                        <td>
                                            <?= $employee->getFirstName(); ?>
                                        </td>
                                        <td>
                                            <?= $employee->getEmail(); ?>
                                        </td>
                                        <td>
                                            <a class="" href="/admin/user/edit/<?= $employee->getId(); ?>">Détails</a>
                                            <a class="" href="/admin/user/edit/<?= $employee->getId(); ?>">Modifier</a>
                                            <a class="" href="/admin/user/delete<?= $employee->getId(); ?>">Supprimer</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- --------------------------------------------------------------- -->

                <!-- ----------------------------------------------- CLIENT MESSAGES -->
                <section class="messages">
                    <h1>Formulaires contact</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Auteur</th>
                                <th>Réf. Véhicule</th>
                                <th>Message</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($messages as $message) { ?>
                                <tr>
                                    <td>
                                        <?= $message->getAuthor()->getFirstName() . ' ' . $message->getAuthor()->getLastName(); ?> <br>
                                    </td>

                                    <td>

                                        <?= $message->getAuthor() ? $message->getAuthor()->getFirstName() : "N.A."; ?>
                                    </td>
                                    <td>

                                        <?= $message->getContent(); ?>
                                    </td>
                                    <td>
                                        <a class="" href="/admin/message/edit/<?= $message->getId(); ?>">Détails</a>
                                        <a class="" href="/admin/message/edit/<?= $message->getId(); ?>">Modifier</a>
                                        <a class="" href="/admin/message/delete<?= $message->getId(); ?>">Supprimer</a>
                                    </td>
                                </tr>


                                <br>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
                <!-- --------------------------------------------------------------- -->

                <!-- ----------------------------------------------- CLIENT COMMENTS -->
                <section class="comments">
                    <h1>Avis clients</h1>
                    <h2>Nouveaux avis</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Note</th>
                                <th>Commentaire</th>
                                <th>Valider</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // add here new comments
                            ?>
                        </tbody>
                    </table>
                    <h2>Avis vérifiés</h2>
                    <table class="checked">
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Note</th>
                                <th>Commentaire</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // add here comments
                            ?>
                        </tbody>
                    </table>
                </section>
                <!-- --------------------------------------------------------------- -->

                <!-- ------------------------------------------------------ CARS ADS -->
                <section class="cars">
                    <h1>Véhicules d'occasion</h1>
                    <div>

                        <h2><?= isset($update_car) ? 'Modifier le véhicule' : 'Ajouter un véhicule'; ?></h2>
                        <form method="post" action="admin.php" enctype="multipart/form-data">
                            <fieldset>
                                <input type="hidden" name="id" value="<?= isset($update_car) ? $update_car['id'] : ''; ?>">
                                <label for="brand">Marque :
                                    <input type="text" name="brand" id="brand" value="<?= isset($update_car) ? $update_car['brand'] : ''; ?>">
                                </label>
                                <label for="model">Modèle :
                                    <input type="text" name="model" id="model" value="<?= isset($update_car) ? $update_car['model'] : ''; ?>">
                                </label>
                                <label for="year">Année :
                                    <input type="number" name="year" id="year" value="<?= isset($update_car) ? $update_car['year'] : ''; ?>">
                                </label>
                                <label for="mileage">Kimométrage :
                                    <input type="number" name="mileage" id="mileage" value="<?= isset($update_car) ? $update_car['mileage'] : ''; ?>">
                                </label>
                                <label for="energy">Carburant :
                                    <input type="text" name="energy" id="energy" value="<?= isset($update_car) ? $update_car['energy'] : ''; ?>">
                                </label>
                                <label for="price">Prix :
                                    <input type="number" name="price" id="price" value="<?= isset($update_car) ? $update_car['price'] : ''; ?>">
                                </label>
                                <label for="main_picture">Photo principale :
                                    <input type="file" name="main_picture" id="main_picture" accept="image/jpeg, image/jpg, image/png">
                                    <?php
                                    if (isset($update_car)) { ?>
                                        <img src="<?= _UPLOAD_IMAGES_ . $update_car['file_name'] ?>" alt="photo du véhicule">
                                    <?php } ?>
                                </label>
                            </fieldset>
                            <input class="button" type="submit" value="<?= isset($update_car) ? 'Mettre à jour le véhicule' : 'Ajouter le véhicule'; ?>" name="<?= isset($update_car) ? 'update_car' : 'new_car'; ?>">

                        </form>
                    </div>
                    <div>
                        <h2>Liste des véhicules</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Marque</th>
                                    <th>Modèle</th>
                                    <th>Année</th>
                                    <th>Kilométrage</th>
                                    <th>Prix</th>
                                    <th>Photo principale</th>
                                    <!-- <th>Autres photos</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // add here cars
                                ?>

                            </tbody>

                        </table>
                    </div>
                </section>
                <!-- --------------------------------------------------------------- -->
            </article>
        </div>
    </div>
</section>