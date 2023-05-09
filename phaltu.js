// JavaScript code to fetch weather data and display it on the webpage
window.addEventListener('DOMContentLoaded', getWeather);

function getWeather() {
  // Change the 'API_KEY' value with your own OpenWeatherMap API key
  const API_KEY = 'be45b3dcf811ef805b8bd625f5c046ee';
  const CITIES = ['New York', 'London', 'Paris', 'Tokyo', 'Sydney', 'Berlin', 'Rome', 'Moscow', 'Madrid', 'Beijing'];

  const weatherInfoContainer = document.getElementById('weather-info');
  const searchForm = document.getElementById('search-form');

  // Event listener for the search form submission
  searchForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting and refreshing the page

    const cityName = document.getElementById('city-input').value.trim();

    // Make a request to the OpenWeatherMap API for the searched city
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=${API_KEY}`)
      .then(response => response.json())
      .then(data => {
        // Clear previous weather information
        weatherInfoContainer.innerHTML = '';

        // Extract relevant weather information from the API response
        const { name, weather, main } = data;
        const { description } = weather[0];
        const { temp, humidity } = main;

        // Create an li element to display the weather information for the searched city
        const cityInfoElement = document.createElement('li');
        cityInfoElement.textContent = `City: ${name} | Weather: ${description} | Temperature: ${convertKelvinToCelsius(temp)} °C | Humidity: ${humidity}%`;

        // Append the li element to the weatherInfoContainer
        weatherInfoContainer.appendChild(cityInfoElement);
      })
      .catch(error => {
        console.log(`Error fetching weather data for ${cityName}:`, error);
      });

    // Reset the search form input field
    searchForm.reset();
  });

  // Display weather information for the predefined cities
  CITIES.forEach(city => {
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}`)
      .then(response => response.json())
      .then(data => {
        // Extract relevant weather information from the API response
        const { name, weather, main } = data;
        const { description } = weather[0];
        const { temp, humidity } = main;

        // Create an li element to display the weather information for the city
        const cityInfoElement = document.createElement('li');
        cityInfoElement.textContent = `City: ${name} | Weather: ${description} | Temperature: ${convertKelvinToCelsius(temp)} °C | Humidity: ${humidity}%`;

        // Append the li element to the weatherInfoContainer
        weatherInfoContainer.appendChild(cityInfoElement);
      })
      .catch(error => {
        console.log(`Error fetching weather data for ${city}:`, error);
      });
  });
}

// Utility function to convert temperature from Kelvin to Celsius
function convertKelvinToCelsius(tempKelvin) {
  return (tempKelvin - 273.15).toFixed(2);
}
