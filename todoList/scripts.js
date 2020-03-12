// var now = dateFormat(new Date(), "dddd, mmmm dS, yyyy, h:MM:ss TT");
// $("h1").html(now);
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

window.onload = function() {
  updateOrder();

  $("#sortable").sortable({
    update: updateOrder
  });
  $("#sortable").disableSelection();
};
