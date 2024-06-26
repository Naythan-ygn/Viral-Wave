// scroll to top button
window.onscroll = function () {
    scrollFunction()
};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("topBtn").style.display = "block";
    } else {
        document.getElementById("topBtn").style.display = "none";
    }
}

// Replace '100' with the desired number
const targetNumber = 300;
const targetNumber1 = 500;
const targetNumber2 = 20;

const numberElement = document.getElementById('number');
const numberElement1 = document.getElementById('number1');
const numberElement2 = document.getElementById('number2');


let currentNumber = 0;

// Counting to '300'
const countInterval = setInterval(() => {
    currentNumber++;
    numberElement.textContent = currentNumber;


    if (currentNumber >= targetNumber) {
        clearInterval(countInterval);
    }
}, 10);

// Counting to '500'
const countInterval1 = setInterval(() => {
    currentNumber++;
    numberElement1.textContent = currentNumber;

    if (currentNumber >= targetNumber1) {
        clearInterval(countInterval1);
    }
}, 10);

// Counting to '20'
const countInterval2 = setInterval(() => {
    currentNumber++;
    numberElement2.textContent = currentNumber;

    if (currentNumber >= targetNumber2) {
        clearInterval(countInterval2);
    }
}, 10);

// This is for the Logo SlideShow
var copy = document.querySelector(".long-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);
