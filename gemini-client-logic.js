function searchPlace() {
    const place = document.getElementById("placeInput").value.trim();
    const resultDiv = document.getElementById("results-content");
    const message = document.getElementById("initialMessage");

    if (!place) {
        alert("Please enter a place name!");
        return;
    }

    message.textContent = "Fetching details for " + place + "...";

    // Temporary fake data for testing
    setTimeout(() => {
        message.textContent = "";
        resultDiv.innerHTML = `
            <h3 class="text-xl font-bold mb-2 text-teal-700">${place}</h3>
            <p>Top attractions: <strong>Backwaters, Beaches, Houseboats</strong></p>
            <p>Nearby hotels: <strong>Lake Palace, Houseboat Stay</strong></p>
            <p>Famous restaurants: <strong>Thaff, Indian Coffee House</strong></p>
        `;
    }, 1000);
}
