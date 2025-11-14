<form action="/admin" method="post" id="opening_setting">
    <legend>
        Horaires d'ouverture :
    </legend>

    <div id="opening_inputs_container">
        <?php
        foreach ($company->getOpenings() as $key => $opening) { ?>
            <div class="openings-inputs">
                <label for="company_openings_day_<?= $key; ?>" class="hidden-labels">Jour d'ouverture</label>
                <select name="company_openings[<?= $key ?>][day]" id="company_openings_day_<?= $key; ?>">
                    <option value="monday" <?= $opening->getDay() === "monday" ? "selected" : "" ?>>Lundi</option>
                    <option value="tuesday" <?= $opening->getDay() === "tuesday" ? "selected" : "" ?>>Mardi</option>
                    <option value="wednesday" <?= $opening->getDay() === "wednesday" ? "selected" : "" ?>>Mercredi</option>
                    <option value="thursday" <?= $opening->getDay() === "thursday" ? "selected" : "" ?>>Jeudi</option>
                    <option value="friday" <?= $opening->getDay() === "friday" ? "selected" : "" ?>>Vendredi</option>
                    <option value="saturday" <?= $opening->getDay() === "saturday" ? "selected" : "" ?>>Samedi</option>
                    <option value="sunday" <?= $opening->getDay() === "sunday" ? "selected" : "" ?>>Dimanche</option>
                </select>

                <label for="company_openings_open_time_<?= $key; ?>" class="hidden-labels">Heure d'ouverture</label>
                <input type="time" name="company_openings[<?= $key ?>][open_time]" id="company_openings_open_time_<?= $key; ?>" value="<?= $opening->getOpenTime() ?>">
                <label for="company_openings_closure_time_<?= $key; ?>" class="hidden-labels">Heure de fermeture</label>
                <input type="time" name="company_openings[<?= $key ?>][closure_time]" id="company_openings_closure_time_<?= $key; ?>" value="<?= $opening->getClosureTime() ?>">

                <button type="button" class="button remove-opening">remove opening</button>
            </div>
        <?php
        } ?>
    </div>

    <button class="button" type="button" id="add-opening" aria-label="Ajouter une plage horaire" aria-controls="button"> + </button>
    <input type="submit" name="admin_company_openings" id="admin_company_openings" value="Mettre à jour les horaires" class="button">

</form>