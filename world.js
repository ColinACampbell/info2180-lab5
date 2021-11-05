window.onload = () => {
    const lookupBtn = document.getElementById('lookup');
    const countryInput = document.getElementById("country");
    const results = document.getElementById("result")

    lookupBtn.addEventListener('click', () => {
        const country = countryInput.value
        console.log(country)
        fetch(`/world.php?country=${country}`).then(async (response) => {
            results.innerHTML = await response.text()
        })

    })
}