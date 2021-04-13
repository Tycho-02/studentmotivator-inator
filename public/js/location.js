let lat;
let long;
function getLocation() {
  lat = document.getElementById("js--latitude");
  long = document.getElementById("js--longitude");
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  lat.value = position.coords.latitude;
  long.value = position.coords.longitude;
}