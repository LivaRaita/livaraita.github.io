// create a loop that prints every second number starting from 10 and ending with 20

for (let i = 10; i <= 20; i += 2) {
  console.log(i);
}

// loop thru an array and print out it's content

var arr = [1, 2, 3, 4, 5, 6];

arr.forEach(function(value) {
  console.log(value);
});

// modify array of numbers by multiplying the numbers by itself

var arr = [1, 2, 3, 4, 5, 6];

var sqrtArray = arr.map(function(value) {
  return value * value;
});

console.log(sqrtArray);

// Declare a function that can be called even if it's defined after it is called
document.getElementsByTagName("body")[0].addEventListener("scroll", onscroll);

var onscroll = function() {
  console.log("you just scrolled");
};

// define a function that can be called only after it has been declared

function onscroll() {
  console.log("you just scrolled");
}

document.getElementsByTagName("body")[0].addEventListener("scroll", onscroll);

// create an arrow function with two or more parameters

// create a function with unknown amount of parameters
// create a function that accepts object as an parameters and reads assigns it's key/value pairs to function variables
// Use two of built in prototype functions
// Create your own prototype
// // create new instance
// // call a function from it
