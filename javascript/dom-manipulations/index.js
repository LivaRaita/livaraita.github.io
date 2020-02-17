// if (localStorage.visited_date) {
//   localStorage.visited_date = new Date();
// } else {
//   const dateTimeNow = new Date().getTime();
//   if (dateTimeNow - new Date(localStorage.visited_date).getTime() > 1000 * 60) {
//     console.log("It has been more than a minute");
//   }
// }

// Retrieve the domain name
window.location;

// Save and then retrieve some data with localStorage

window.localStorage.date = new Date();

console.log(window.localStorage.date);

// Add some cookies

document.cookie = "have a cookie";

document.cookie;

// Create a list, loop thru the list elements and add a class to each of the list elements

Object.keys(document.getElementsByTagName("li")).forEach(function(i) {
  document.getElementsByTagName("li")[i].classList.add("test-class");
});

// Handle window

// // Open new window
window.open();

// // Change it's size
window.open("", "", "height: 300, width: 300");

// // Write data to it

// // Add an event listener that triggers window close
window.close();

// Create the HTML (css if needed) and add three different event listeners to created HTML
document
  .getElementsByTagName("li")
  .addEventListener("mouseover", function(event) {
    event.target.style.color = "purple";
  });
