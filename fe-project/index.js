// DONE: Create and save an object from the values provided in the form

let products = [];

function objectId() {
  return (
    hex(Date.now() / 1000) +
    " ".repeat(16).replace(/./g, () => hex(Math.random() * 16))
  );
}

function hex(value) {
  return Math.floor(value).toString(16);
}

const addProduct = ev => {
  ev.preventDefault();
  let product = {
    product_id: objectId(),
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

  addProductToTable(product);

  localStorage.setItem("ProductList", JSON.stringify(products));
};
document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("submit-product")
    .addEventListener("click", addProduct);

  let savedProducts = JSON.parse(window.localStorage.getItem("ProductList"));
  if (savedProducts) {
    products = savedProducts;
  }
  fillTable(products);
});

function fillTable(productArray) {
  productArray.forEach(addProductToTable);
}

function addProductToTable(value) {
  let productListHTML = "";
  productListHTML += "<tr>";
  productListHTML += "<td>" + value.name + "</td>";
  productListHTML += "<td>" + value.category + "</td>";
  productListHTML += "<td>" + value.price + "</td>";
  productListHTML += "<td>" + value.stock + "</td>";
  productListHTML += "<td>" + value.description + "</td>";
  productListHTML += "<td>" + value.sell + "</td>";
  productListHTML += "<td>" + value.store + "</td>";
  productListHTML +=
    "<td><button class='remove'}>" +
    "<i class='fas fa-trash-alt'></i>" +
    "</button></td>";
  productListHTML += "</tr>";
  $("#productListHTML").append(productListHTML);
}

// Get modal when user adds a product

var modalForSuccess = document.getElementById("success");
var btnSubmit = document.getElementById("submit-product");
var closeButton = document.getElementById("close-btn");
var newProductPopup = document.getElementById("add-new-product");

btnSubmit.onclick = function() {
  newProductPopup.style.display = "none";
  modalForSuccess.style.visibility = "visible";
};

// TODO: Here I need to add a product name and
// later remove it from this popup

//Task description:

// DONE 1. Create a button that shows a form (it can slid from the side, be shown in the main html or as a popup)
// UN-BUG Add minimum 4 different form fields, make one be visible only on some type of conditions (if one form field has been filled, checkbox selected, select field appropriate value selected)
// Validate minimum two of the fields (on button click point nr.4), show a visual representation if fields ar not valid
// Error messages for not valid fields will be treated as a bonus
// DONE Add a button that triggers the validation
// DONE If you find out a way how to save the data somewhere - it will be treated as a bonus
// If Validation passes show a popup with a full screen backdrop that contains some type of message with some data from the form (like: "thank you, username, we have received your request")
// Add a button to the popup that closes it
// Create a table where the data from the form will be shown, add an ID column and actions column that contains a delete button
// // If you did not think about a way to save the data, create 10 fake static records
// // If you saved the data somewhere, show it dynamically, make an action that can delete each individual record
// Push the final product to github and post it in google classroom under the assignment
