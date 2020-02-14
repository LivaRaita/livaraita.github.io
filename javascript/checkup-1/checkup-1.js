// create a loop that prints every second number starting from 10 and ending with 20

for (let i = 10; i <= 20; i += 2) {
  console.log(i);
}

// loop thru an array and print out it's content

var arr = [1, 2, 3, 4, 5, 6];

arr.forEach(function(value) {
  console.log(value);
});

// or like this:

arr.forEach((v, i) => {
  console.log("value: " + v + " , index: " + i);
});

// modify array of numbers by multiplying the numbers by itself

var arr = [1, 2, 3, 4, 5, 6];

var sqrtArray = arr.map(function(value) {
  return value * value;
});

console.log(sqrtArray);

// Declare a function that can be called even if it's defined after it is called

fn1();

function fn1() {
  console.log("call fn 1");
}

// call fn1
// document.getElementsByTagName("body")[0].addEventListener("scroll", onscroll);

// var onscroll = function() {
//   console.log("you just scrolled");
// };

// define a function that can be called only after it has been declared

// var fn2 = funtion() {
//   console.log("call fn 2");
// }

// fn2();
// call fn 2

// function onscroll() {
//   console.log("you just scrolled");
// }

// document.getElementsByTagName("body")[0].addEventListener("scroll", onscroll);

// create an arrow function with two or more parameters

let myData = params => {
  const { animal, breed, flies } = params;

  console.log(animal);
  console.log(breed);
  console.log(flies);
};

myData({ animal: "bird", breed: "pinguin", flies: false });

// create a function with unknown amount of parameters

const booksRead = function(amount, ...theRest) {
  let totalCount = amount;

  theRest.forEach(value => {
    totalCount += value;
  });

  return totalCount;
};
booksRead(10, 3, 20);
booksRead(10, 3, 20, 7, 23);

// create a function that accepts object as an parameters and reads assigns it's key/value pairs to function variables

// Use two of built in prototype functions

[].length;

Array.isArray("test");

Math.PI;

// Create your own prototype
// // create new instance

function User(username, password) {
  this.username = username;
  this.password = password;

  this.checkUser = function(uname, pass) {
    if (this.username === uname && this.password === pass) {
      console.log("login success");
    } else {
      console.log("Password or username is not correct");
    }
  };
}

let liva = new User("liva", "my_password");

liva.checkUser("eddjhg", "kjhsf");
// // call a function from it
