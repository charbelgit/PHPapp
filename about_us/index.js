var today = new Date();
var hourNow = today.getHours();
var greeting;
if (hourNow > 18) {
    greeting = "Good evening!";
} else if (hourNow > 12) {
    greeting = "Good afternoon!";
} else if (hourNow > 0) {
    greeting = "Good morning!";
} else {
    greeting = "Welcome!";
}
function fgreeting(){
    document.getElementById("greetings").innerHTML = greeting;
}
var modalTrainer = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalTrainer) {
        modal.style.display = "none";
    }
}
var modalUser = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalUser) {
        modal.style.display = "none";
    }
}
