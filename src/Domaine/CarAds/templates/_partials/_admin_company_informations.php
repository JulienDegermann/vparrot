<fieldset>
    <legend>Entreprise : </legend>
    <label for="company_name">Nom :
        <input type="text" name="company_name" id="company_name" value="<?= $company->getName(); ?>">
    </label>
    <label for="company_phone">Téléphone :
        <input type="tel" name="company_phone" maxlength="10" minlength="10" id="company_phone" value="<?= $company->getPhone(); ?>">
    </label>
    <label for="company_email">E-mail :
        <input type="email" name="company_email" id="company_email" value="<?= $company->getEmail() ?? ""; ?>">
    </label>
</fieldset>
<fieldset>
    <legend>Adresse</legend>
    <label for="company_address">Adresse :
        <input type="text" name="company_address" id="company_address" value="<?= $company->getAddress() ?? ""; ?>">
    </label>
    <label for="company_city">Ville :
        <input type="text" name="company_city" id="company_city" value="<?= $company->getCity(); ?>">
    </label>
    <label for="company_zip_code">Code postal :
        <input type="number" name="company_zip_code" id="company_zip_code" value="<?= $company->getZipCode(); ?>">
    </label>
</fieldset>