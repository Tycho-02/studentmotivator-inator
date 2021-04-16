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
  lat.value = Math.round(position.coords.latitude * 1000) / 1000;
  long.value = Math.round(position.coords.longitude * 1000) / 1000;
}