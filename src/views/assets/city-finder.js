const fetchData = async (url) => {
  const res = await fetch(url)
  return await res.json()
}

const pintarInfoCiudades = (resultado) => {
  const rootContainer = document.querySelector("#root")

  let html = `
    <table class="table table-striped w-75 m-auto text-center align-middle">
    <thead>
    <tr>
        <th>Ciudad</th>
        <th>Pais</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
  `

  for (const city of resultado.results) {
    console.log(city)
    // Check if town is filled
    let town = city.components.town
    if (!town) town = city.components.city
    if (!town) town = city.components.hamlet
    if (!town) town = city.components.village
    if (!town) town = city.components.municipality

    const country = city.components.country
    const latitude = city.geometry.lat
    const longitude = city.geometry.lng

    html += `
      <tr>
        <td>${town}</td>
        <td>${country}</td>
        <td>${latitude}</td>
        <td>${longitude}</td>
        <td><a href="index.php?action=save-city&city=${town}&country=${country}&latitude=${latitude}&longitude=${longitude}" class="btn btn-primary">Guardar ciudad</a></td>
      </tr>
    `
  }

  html += `
  </tbody>
  </table>
  `

  rootContainer.innerHTML = html

}

window.onload = () => {
  const cityInp = document.querySelector("#city")

  cityInp.addEventListener("keyup", async (e) => {

    // No hacer llamada si esta vacio
    if (cityInp.value.trim() === "") return
    const url = `https://api.opencagedata.com/geocode/v1/json?q=${cityInp.value}&key=46bfadd8788b4a9db740cbdbe1434c1b`

    const result = await fetchData(url)

    pintarInfoCiudades(result)
  })
}