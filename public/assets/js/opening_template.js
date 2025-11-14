export default function OpeningTemplate (i) {
    return `<div class="openings-inputs">
            <label for="company_openings_day_${i}" class="hidden-labels">Jour d'ouverture</label>
            <select name="company_openings[${i}][day]" id="company_openings_day_${i}">
                <option value="monday" selected>Lundi</option>
                <option value="tuesday">Mardi</option>
                <option value="wednesday">Mercredi</option>
                <option value="thursday">Jeudi</option>
                <option value="friday">Vendredi</option>
                <option value="saturday">Samedi</option>
                <option value="sunday">Dimanche</option>
            </select>

            <label for="company_openings_open_time_${i}" class="hidden-labels">Heure d'ouverture</label>
            <input type="time" name="company_openings[${i}][open_time]" id="company_openings_open_time_${i}" value="08:00">
            <label for="company_openings_closure_time_${i}" class="hidden-labels">Heure de fermeture</label>
            <input type="time" name="company_openings[${i}][closure_time]" id="company_openings_closure_time_${i}" value="18:00">
            <button type="button" class="button remove-opening">remove opening</button>
        </div>`;
}
