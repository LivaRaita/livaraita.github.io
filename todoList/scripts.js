window.onload = function() {
  //   $("tr").on("mouseup", function(event, ui) {
  //     alert("nice");
  //   });

  $("#sortable").sortable({
    update: function(event, ui) {
      //data order;
    }
  });
  $("#sortable").disableSelection();

  // $("tr").sortable({
  //   update: function(event, ui) {
  //     alert("penis");
  //   }
  // });
};
