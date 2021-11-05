window.onload = () => {
    const lookupCountryBtn = document.getElementById('lookup-country');
    const lookupCitiesBtn = document.getElementById('lookup-cities');
    const countryInput = document.getElementById("country");
    const results = document.getElementById("result")


    lookupCountryBtn.addEventListener('click', () => {
        const country = countryInput.value

        fetch(`/world.php?country=${country}`).then(async (response) => {
            results.innerHTML = await response.text()
        })
    })

    lookupCitiesBtn.addEventListener("click", () => {
        const country = countryInput.value
        fetch(`/world.php?country=${country}&context=cities`).then(async (response) => {
            results.innerHTML = await response.text()
        })
    })
}