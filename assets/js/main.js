var liveAlert = document.getElementById("liveAlert");
var alertClose = document.getElementById("alert-close");

// Close alert box
alertClose.addEventListener("click", function () {
  liveAlert.remove();
});

// Close alert box after 3 seconds
setTimeout(() => {
  liveAlert.remove();
}, 3000);
