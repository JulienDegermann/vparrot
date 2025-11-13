<fieldset id="opening_setting">
    <legend>
        Horaires d'ouverture :
    </legend>
    <?php
    foreach ($company->getOpenings() as $opening) { ?>
        <label for="day_<?= strtolower($opening->getDay()); ?>"><?= $opening->getDay(); ?> :
            <input type="time" name="open_<?= strtolower($opening->getDay()); ?>" id="open_<?= strtolower($opening->getDay()); ?>" value="<?= $opening->getOpenTime(); ?>">
            <input type="time" name="close_<?= strtolower($opening->getDay()); ?>" id="close_<?= strtolower($opening->getDay()); ?>" value="<?= $opening->getClosureTime(); ?>">
        </label>
    <?php } ?>

    <?php
    if (empty($company->getOpenings())) { ?>
        <div class="openings-inputs">

            <label for="company_openings[day][]" class="hidden-labels">Jour d'ouverture</label>
            <select name="company_openings[day][]" id="company_openings[day][]">
                <option value="monday" selected>Lundi</option>
                <option value="tuesday">Mardi</option>
                <option value="wednesday">Mercredi</option>
                <option value="thursday">Jeudi</option>
                <option value="friday">Vendredi</option>
                <option value="saturday">Samedi</option>
                <option value="sunday">Dimanche</option>
            </select>

            <label for="company_openings[opening_time][]" class="hidden-labels">Heure d'ouverture</label>
            <input type="time" name="company_openings[opening_time][]" id="company_openings[opening_time][]" value="08:00">
            <label for="company_openings[closure_time][]" class="hidden-labels">Heure de fermeture</label>
            <input type="time" name="company_openings[closure_time][]" id="company_openings[closure_time][]" value="18:00">
        </div>
    <?php

    }
    ?>

    <button class="button" type="button" id="add-opening" aria-label="Ajouter une plage horaire" aria-controls="button"> + </button>

</fieldset>