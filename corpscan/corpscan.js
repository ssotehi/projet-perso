
function resetPassword() {
var modal = document.getElementById("reset-modal");
var resetlink = document.getElementById("reset-link");
var span = document.getElementsByClassName("close")[0];

resetlink.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
 }
}

