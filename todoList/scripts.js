const monthNames = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];

let today = new Date();
let date = today.getDate();
let month = monthNames[today.getMonth()];
let year = today.getFullYear();

$("h1").html(month + " " + date + ", " + year);

// ### This function creates an array where a task's order id (the index value in the array) and row id is saved and passes to process.php ###

function updateOrder() {
  var data = [];

  $(".todo-item").each(function(index) {
    data.push({
      orderId: index,
      rowId: $(this).attr("data-row-id")
    });
  });

  $.ajax({
    data: { orderData: data },
    type: "POST",
    url: "process.php"
  });
}

// ### This is a jQuery UI magic: sortable function ###

window.onload = function() {
  updateOrder();

  $("#sortable").sortable({
    update: updateOrder,
    activate: function(event, ui) {
      $(ui.item).css({
        "box-shadow": "0px 2px 8px rgba(0, 0, 0, 0.25)",
        "border-radius": "4px"
      });
      $(ui.item)
        .find(".button-groups")
        .css("visibility", "hidden");
    },
    deactivate: function(event, ui) {
      $(ui.item).css("box-shadow", "none");
    }
  });
  $("#sortable").disableSelection();
};

$("tr").hover(
  function() {
    $(this)
      .find(".button-groups")
      .css("visibility", "visible");
  },
  function() {
    $(this)
      .find(".button-groups")
      .css("visibility", "hidden");
  }
);
