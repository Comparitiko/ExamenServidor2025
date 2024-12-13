const getCitiesCoords = () => {
  const citiesCoords = []
  const cards = document.querySelectorAll(".card")
  cards.forEach(card => {
    citiesCoords.push({
      latitude: card.querySelector(".latitude").innerText,
      longitude: card.querySelector(".longitude").innerText
    })
  })
  return citiesCoords
}

const getWeatherCodeMessage = (weatherCode) => {
  const codes = {
    '0': 'Cielo despejado',
    '1': 'Mayormente despejado',
    '2': 'Parcialmente nublado',
    '3': 'Nublado',
    '45': 'Niebla',
    '48': 'Niebla',
    '51': 'Intensidad ligera',
    '53': 'Intensidad moderada',
    '55': 'Intensidad densa',
    '56': 'Congelacion moderada',
    '57': 'Congelacion densa',
    '61': 'Lluvia ligera',
    '63': 'Lluvia moderada',
    '65': 'Lluvia densa',
    '66': 'Helada ligera',
    '67': 'Helada densa',
    '71': 'Nevada ligera',
    '73': 'Nevada moderada',
    '75': 'Nevada densa',
    '77': 'Copos de nieve',
    '80': 'Lluvias ligeras',
    '81': 'Lluvias moderadas',
    '82': 'Lluvias violentas',
    '85': 'Nevadas ligeras',
    '86': 'Nevadas pesadas',
    '95': 'Tormenta eléctrica ligera o moderada',
    '96': 'Tormenta eléctrica con ligero y pesado granizo',
    '99': 'Tormenta eléctrica con ligero y pesado granizo'
  }
  return codes[weatherCode]
}

window.onload = async () => {
  const divInfo = document.querySelectorAll(".div-info")

  const citiesCoords = getCitiesCoords();

  const promises = []

  citiesCoords.forEach(cityCoords => {
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${cityCoords.latitude}&longitude=${cityCoords.longitude}&current=temperature_2m,relative_humidity_2m,precipitation,weather_code&daily=weather_code,temperature_2m_max,temperature_2m_min&forecast_days=3`
    promises.push(
      fetch(url).then(res => res.json())
    )
  })

  // Hacer las peticiones a la vez
  Promise.all(promises).then(data => {
    for (let i = 0; i < data.length; i++) {
      let html = `
        <div>
          <p>Porcentaje de precipitacion actual: ${data[i].current.precipitation}</p>
          <p>Humedad relativa actual: ${data[i].current.relative_humidity_2m}</p>
          <p>Porcentaje de precipitacion actual: ${data[i].current.temperature_2m}</p>
          <p>${getWeatherCodeMessage(data[i].current.weather_code)}</p>
        </div>
      `
      for (let j = 0; j < data[i].daily.weather_code.length; j++) {
        html += `
          <div>
            <h3 class="text-danger">Dia ${j + 1}</h3>
            <p>Temperatura mínima: ${data[i].daily.temperature_2m_min[j]}</p>
            <p>Temperatura máxima: ${data[i].daily.temperature_2m_max[j]}</p>
            <p>${getWeatherCodeMessage(data[i].daily.weather_code[j])}</p>
          </div>
        `
      }

      divInfo[i].innerHTML = html
    }
  })
}