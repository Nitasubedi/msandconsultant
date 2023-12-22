document.addEventListener("DOMContentLoaded", function () {
    const sliderContainer = document.getElementById("service-slider");

    // Fetch data from the server
    fetch('/admin/service')
        .then(response => response.json())
        .then(data => {
           
            console.log("Data fetched:", data);
            const sliderContent = document.createElement("div");
            sliderContent.className = "slider-content";

            data.forEach(service => {
                const serviceCard = document.createElement("div");
                serviceCard.className = "service-card";
                serviceCard.innerHTML = `<h3>${service.title}</h3><p>${service.description}</p>`;
                sliderContent.appendChild(serviceCard);
            });

            sliderContainer.appendChild(sliderContent);
        })
        .catch(error => console.error("Error fetching data:", error));
});