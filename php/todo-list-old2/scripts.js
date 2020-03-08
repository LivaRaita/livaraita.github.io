$(function() {
  $(".js-delete-row").on("click", function() {
    const id = $(this).attr("data-id");

    $.ajax({
      method: "GET",
      url:
        "/livaraita.github.io/php/todo-list/delete.php?id=" +
        id +
        "&redirect=false"
    }).then(function() {
      window.location = "/livaraita.github.io/php/todo-list";
    });
  });
});
