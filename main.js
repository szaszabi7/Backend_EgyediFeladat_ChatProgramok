document.addEventListener("DOMContentLoaded", init)

function init() {
    document.getElementById('numberofusers').addEventListener("keyup mouseup", numberCheck)
    document.getElementById('ratingandroid').addEventListener("keyup mouseup", ratingAndrodidCheck)
    document.getElementById('ratingapple').addEventListener("keyup mouseup", ratingAppleCheck)
    document.getElementById('editGomb').addEventListener("click", formEll)
}

var numberofusers = 0;
var ratingandroid = 0;
var ratingapple = 0;

var errorMessage = "0-nál nem lehet kisebb";


function numberCheck() {
    numberofusers = document.getElementById('numberofusers').value;

    if (numberofusers < 0) {
        document.getElementById('numberError').innerHTML = ` ${errorMessage}`;
    }
}

function ratingAndrodidCheck() {
    ratingandroid = document.getElementById('ratingandroid').value;

    if (ratingandroi < 0) {
        document.getElementById('androidError').innerHTML = ` ${errorMessage}`;
    }
}

function ratingAppleCheck() {
    ratingapple = document.getElementById('ratingapple').value;

    if (ratingapple < 0) {
        document.getElementById('appleError').innerHTML = ` ${errorMessage}`;
    }
}

 function formEll(e) {
    if (numberofusers < 0 ||
        ratingandroid < 0 ||
        ratingapple < 0) {
        e.preventDefault();
    }
}