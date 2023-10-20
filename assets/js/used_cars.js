$('form input').on('input propertychange', () => {
  let filter = $('#filter').attr('name')
  let price_min = $('#price_min').val()
  let price_max = $('#price_max').val()
  let mileage_min = $('#mileage_min').val()
  let mileage_max = $('#mileage_max').val()
  let year_min = $('#year_min').val()
  let year_max = $('#year_max').val()

  const url = 'config/filter.php?filter=true&price_min=' + price_min + '&price_max=' + price_max + '&mileage_min=' + mileage_min + '&mileage_max=' + mileage_max + '&year_min=' + year_min + '&year_max=' + year_max
  console.log(url)
  const fetchFilter = fetch(url, { method: 'POST', body: JSON.stringify() })
    .then((res) => {
      return res.json()
    })
    .then((datas) => {
      $('.grid').html('')
      for (data of datas) {
        let html = `
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