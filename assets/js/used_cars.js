$('form input').on('input propertychange', () => {
  const price_min = $('#price_min').val()
  const price_max = $('#price_max').val()
  const mileage_min = $('#mileage_min').val()
  const mileage_max = $('#mileage_max').val()
  const year_min = $('#year_min').val()
  const year_max = $('#year_max').val()

  const url = 'config/filter.php?price_min=' + price_min + '&price_max=' + price_max + '&mileage_min=' + mileage_min + '&mileage_max=' + mileage_max + '&year_min=' + year_min + '&year_max=' + year_max
  const fetchFilter = fetch(url, { method: 'GET', body: JSON.stringify() })
    .then((res) => {
      return res.json()
    })
    .then((datas) => {
      $('.grid').html('')
      for (data of datas) {
        const html = `
          <div class="car-vignette" >
          <div class="img">
              <img src="uploads/images/${data.file_name}" alt="photo ${data.brand} ${data.model}" >
            </div>
            <div class="text">
              <h2>${data.brand} ${data.model}</h2>
              <div>
                <ul>
                  <li>Année: ${data.year}</li>
                  <li>Kilométrage: ${data.mileage} kms</li>
                  <li class="price">${data.price} €</li>
                </ul>
                <a href="used_car.php?id=${data.id}" class="button">+ d'infos</a>
              </div>
            </div>
          </div >
    `;
        $('.grid').append(html)
      }

    })
    .catch(e => {
      console.log(e)
    })
})
