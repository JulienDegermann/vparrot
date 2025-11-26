<form action="/admin" id="company_services" method="post">
    <h3>Services de l'entreprise</h3>

    <?php
    for ($i = 0; $i < count($services); $i++) { ?>
        <fieldset>
            <legend>
                Service n°<?= $i + 1 ?> :
            </legend>
            <input type="hidden" name="company_services[<?= $i ?>][id]" value="<?= $services[$i]->getId() ?>">

            <label for="company_services_name_<?= $i ?>">Nom :</label>
            <input type="text" name="company_services[<?= $i ?>][name]" id="company_services_name_<?= $i ?>" value="<?= $services[$i]->getName() ?>">

            <label for="company_services_<?= $i ?>">Description</label>
            <textarea name="company_services[<?= $i ?>][description]" id="company_services_description_<?= $i ?>" rows="10" cols="40"><?= $services[$i]->getDescription() ?></textarea>

        </fieldset>

    <?php } ?>


    <input type="submit" name="admin_company_services" id="admin_company_services" value="Mettre à jour les services" class="button">


</form>