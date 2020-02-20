// DONE: Create and save an object from the values provided in the form

let products = [];

const addProduct = ev => {
  ev.preventDefault();
  let product = {
    name: document.getElementById("name").value,
    category: document.getElementById("category").value,
    price: document.getElementById("price").value,
    stock: document.getElementById("stock").value,
    description: document.getElementById("description").value,
    sell: document.getElementById("sell").value,
    store: document.getElementById("store").value
  };
  products.push(product);
  document.forms[0].reset();

  localStorage.setItem("ProductList", JSON.stringify(products));
};
document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("submit-product")
    .addEventListener("click", addProduct);
});

//TAKE THE VALUES FROM THE JSON FILE AND REPRESENT IN THE TABLE

// const products = [
//   {
//     name: "Movie",
//     category: "Films, TV, Music & Games",
//     price: 25,
//     in_stock: 25,
//     description: "Great product. Highly recommended for movie nights.",
//     sell: true,
//     store: "Premium Store"
//   },
//   {
//     name: "Popcorn",
//     category: "Food",
//     price: 25,
//     in_stock: 25,
//     description: "Great product. Highly recommended for movie nights.",
//     sell: true,
//     store: "Premium Store"
//   }
// ];

// let product = {
//   name: "Movie",
//   category: "Films, TV, Music & Games",
//   price: 25,
//   in_stock: 25,
//   description: "Great product. Highly recommended for movie nights.",
//   sell: true,
//   store: "Premium Store"
// };

// For adding objects to the array

// products.push(product);

// // <---- This adds the data to the table ---->

// var k = "<tbody>";
// for (i = 0; i < products.length; i++) {
//   k += "<tr>";
//   k += "<td>" + products[i].name + "</td>";
//   k += "<td>" + products[i].category + "</td>";
//   k += "<td>" + products[i].price + "</td>";
//   k += "<td>" + products[i].in_stock + "</td>";
//   k += "<td>" + products[i].description + "</td>";
//   k += "<td>" + products[i].sell + "</td>";
//   k += "<td>" + products[i].store + "</td>";
//   k += "<td>" + "<button>Delete</button>" + "</td>";
//   k += "</tr>";
// }
// k += "</tbody>";
// document.getElementById("product-list").innerHTML = k;

// TODO: un-bug this. It doesn't work correctly
// This shows and hides a form field

$("#sell").change(function() {
  if ($(this).is(":checked")) {
    $("#storeDiv").show();
  } else {
    $("#storeDiv").hide();
  }
});

// TODO: Here I need to add a product name and
// later remove it from this popup

// $(document).ready(function() {
//   $("#submit-product").click(function() {
//     //here the value is stored in variable.
//     var x = $("#name").val();
//     $("p").append(function(n) {
//       return "Looks great! A new product" + x + " added to your store!";

//       // document.getElementById("#product-name").innerHTML = x;
//     });
//   });
// });

// Adding product to the data table

// $(document).ready(function() {
//   $("#submit-product").click(function() {
//     var name = $("#name").val();
//     var category = $("#category").val();
//     var price = $("#price").val();
//     var stock = $("#stock").val();
//     var description = $("#description").val();
//     var sell = $("#sell").val();
//     var store = $("#store").val();
//     var deleteItem = "<i class='fas fa-trash-alt'></i>";
//     var markup =
//       "<tr><td>" +
//       name +
//       "</td><td>" +
//       category +
//       "</td><td>" +
//       price +
//       "</td><td>" +
//       stock +
//       "</td><td>" +
//       description +
//       "</td><td>" +
//       sell +
//       "</td><td>" +
//       store +
//       "</td><td>" +
//       deleteItem +
//       "</td></tr>";
//     $("table tbody").append(markup);
//   });
// });

//Task description:

// DONE 1. Create a button that shows a form (it can slid from the side, be shown in the main html or as a popup)
// UN-BUG Add minimum 4 different form fields, make one be visible only on some type of conditions (if one form field has been filled, checkbox selected, select field appropriate value selected)
// Validate minimum two of the fields (on button click point nr.4), show a visual representation if fields ar not valid
// Error messages for not valid fields will be treated as a bonus
// Add a button that triggers the validation
// If you find out a way how to save the data somewhere - it will be treated as a bonus
// If Validation passes show a popup with a full screen backdrop that contains some type of message with some data from the form (like: "thank you, username, we have received your request")
// Add a button to the popup that closes it
// Create a table where the data from the form will be shown, add an ID column and actions column that contains a delete button
// // If you did not think about a way to save the data, create 10 fake static records
// // If you saved the data somewhere, show it dynamically, make an action that can delete each individual record
// Push the final product to github and post it in google classroom under the assignment
