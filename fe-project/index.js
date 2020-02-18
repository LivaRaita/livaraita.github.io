//TODO: save data to local storage

$(window).on("unload", function() {
  saveSettings();
  loadSettings();
});

function loadSettings() {
  $("#name").val(localStorage.name);
  $("#category").val(localStorage.category);
  $("#price").val(localStorage.price);
  $("#stock").val(localStorage.stock);
  $("#description").val(localStorage.description);
  $("#sell").val(localStorage.sell);
  $("#store").val(localStorage.store);
  //   "<i class='fas fa-trash-alt'></i>"(localStorage.deleteItem);
}

function saveSettings() {
  localStorage.name = $("#name").val();
  localStorage.category = $("#category").val();
  localStorage.price = $("#price").val();
  localStorage.stock = $("#stock").val();
  localStorage.description = $("#description").val();
  localStorage.sell = $("#sell").val();
  localStorage.store = $("#store").val();
  //   localStorage.deleteItem = "<i class='fas fa-trash-alt'></i>";
}

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

$(document).ready(function() {
  $("#submit-product").click(function() {
    //here the value is stored in variable.
    var x = $("#name").val();
    $("p").append(function(n) {
      return "Looks great! A new product" + x + " added to your store!";

      // document.getElementById("#product-name").innerHTML = x;
    });
  });
});

// Adding product to the data table

$(document).ready(function() {
  $("#submit-product").click(function() {
    var name = $("#name").val();
    var category = $("#category").val();
    var price = $("#price").val();
    var stock = $("#stock").val();
    var description = $("#description").val();
    var sell = $("#sell").val();
    var store = $("#store").val();
    var deleteItem = "<i class='fas fa-trash-alt'></i>";
    var markup =
      "<tr><td>" +
      name +
      "</td><td>" +
      category +
      "</td><td>" +
      price +
      "</td><td>" +
      stock +
      "</td><td>" +
      description +
      "</td><td>" +
      sell +
      "</td><td>" +
      store +
      "</td><td>" +
      deleteItem +
      "</td></tr>";
    $("table tbody").append(markup);
  });
});

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
