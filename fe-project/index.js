let newProductButton = document.getElementById("new-product");
let addNewProductPopup = document.getElementById("add-new-product");
newProductButton.addEventListener("click", function() {
  addNewProductPopup.classList.add("overlay-full-screen-visible");
  storeDiv.classList.add("form-item-hidden");
});

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

const addProduct = function(ev) {
  ev.preventDefault();

  let inputRequired = document.getElementsByClassName("required");
  for (let i = 0; i < inputRequired.length; i++) {
    if (inputRequired[i].value === "none" || inputRequired[i].value === "") {
      inputRequired[i].focus();
      return false;
    }
  }

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
  addNewProductPopup.classList.remove("overlay-full-screen-visible");

  // let successPopup = document.getElementById("success");
  // let displayProductName = document.getElementById("display-product-name");
  successPopup.classList.add("overlay-visible");
  displayProductName.innerHTML = product.name;

  deleteItemPopup.classList.remove("overlay-visible");
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
  initializeRemoveButtons();
});

function fillTable(productArray) {
  $("#productListHTML tr").remove();
  productArray.forEach(addProductToTable);
}

function addProductToTable(value) {
  let productListHTML = "";
  productListHTML += "<tr>";
  productListHTML += "<td>" + value.product_id + "</td>";
  productListHTML += "<td>" + value.name + "</td>";
  productListHTML += "<td>" + value.category + "</td>";
  productListHTML += "<td>" + value.price + "</td>";
  productListHTML += "<td>" + value.stock + "</td>";
  productListHTML += "<td>" + value.description + "</td>";
  productListHTML += "<td>" + value.sell + "</td>";
  productListHTML += "<td>" + value.store + "</td>";
  productListHTML +=
    "<td><button class='remove' data-product-id='" +
    value.product_id +
    "'>" +
    "<i class='fas fa-trash-alt'></i>" +
    "</button></td>";
  productListHTML += "</tr>";
  $("#productListHTML").append(productListHTML);
}

let deleteItemPopup = document.getElementById("delete-item");
let successPopup = document.getElementById("success");
let displayProductName = document.getElementById("display-product-name");

function openDeletePopup() {
  deleteItemPopup.classList.toggle("overlay-visible");
}

let closePopup = document.querySelectorAll(".close");
for (var i = 0; i < closePopup.length; i++) {
  closePopup[i].addEventListener("click", function() {
    deleteItemPopup.classList.remove("overlay-visible");
    successPopup.classList.remove("overlay-visible");
    addNewProductPopup.classList.remove("overlay-full-screen-visible");
  });
}

function initializeRemoveButtons() {
  let btnRemove = document.querySelectorAll(".remove");

  for (var i = 0; i < btnRemove.length; i++) {
    btnRemove[i].addEventListener("click", function() {
      openDeletePopup();

      let deleteButton = document.querySelector("#delete-button");
      deleteButton.setAttribute("data-id", this.dataset.productId);

      let deleteButtonId = deleteButton.getAttribute("data-id");

      deleteButton.addEventListener("click", function() {
        for (let i = 0; i < products.length; i++) {
          if (products[i].product_id === deleteButtonId) {
            products.splice(i, 1);
            localStorage.setItem("ProductList", JSON.stringify(products));
            fillTable(products);
            deleteItemPopup.classList.remove("overlay-visible");
            initializeRemoveButtons();
          }
        }
      });
    });
  }
}

let sell = document.getElementById("sell");
let storeDiv = document.getElementById("storeDiv");
let storeSelection = document.getElementById("store");

sell.addEventListener("change", function() {
  if (sell.checked) {
    sell.value = "yes";
    storeDiv.classList.remove("form-item-hidden");
    storeSelection.classList.add("required");
  } else {
    sell.value = "no";
    storeDiv.classList.add("form-item-hidden");
    storeSelection.classList.remove("required");
  }
});

//Task description:

// DONE 1. Create a button that shows a form (it can slid from the side, be shown in the main html or as a popup)
// DONE Add minimum 4 different form fields, make one be visible only on some type of conditions (if one form field has been filled, checkbox selected, select field appropriate value selected)
// DONE Validate minimum two of the fields (on button click point nr.4), show a visual representation if fields ar not valid
// Error messages for not valid fields will be treated as a bonus
// DONE Add a button that triggers the validation
// DONE If you find out a way how to save the data somewhere - it will be treated as a bonus
// DONE If Validation passes show a popup with a full screen backdrop that contains some type of message with some data from the form (like: "thank you, username, we have received your request")
// DONE Add a button to the popup that closes it
// DONE Create a table where the data from the form will be shown, add an ID column and actions column that contains a delete button
// // If you did not think about a way to save the data, create 10 fake static records
// // DONE If you saved the data somewhere, show it dynamically, make an action that can delete each individual record
// Push the final product to github and post it in google classroom under the assignment
