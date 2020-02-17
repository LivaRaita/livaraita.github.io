$(function() {
  $(".make-request").on("click", function() {
    $.ajax({
      method: "GET",
      url: "https://reqres.in/api/users"
    }).done(function(response) {
      response.data.forEach(function(value, index) {
        const img = '<img src="' + value.avatar + '">';
        const row =
          "\
          <tr>\
            <td>" +
          value.id +
          '</td>\
            <td class="cell-img">' +
          img +
          "</td>\
            <td>" +
          value.first_name +
          "</td>\
            <td>" +
          value.last_name +
          "</td>\
            <td>" +
          value.email +
          "</td>\
          </tr>";

        $("#data-table")
          .find("tbody")
          .append(row);
      });
      $makeRequest.attr("disabled", true);
    });
  });

  var makeRequest = function() {};

  $(".start-action").on("click", startProgress);
  $(".stop-action").on("click", stopProgress);
  $(".reset-action").on("click", resetProgress);

  function startProgress() {
    const cycleInterval = $("#cycle-interval").val();
    let width = 0;

    //   if (cycleInterval > 0) {
    $(".progress").width(0);

    progressInterval = setInterval(function() {
      width++;
      $(".progress").width(width + "%");

      if (width >= 100) {
        stopProgress();
      }
    }, (cycleInterval * 1000) / 100);
    //   }
  }

  function stopProgress() {
    clearInterval(progressInterval);
  }

  function resetProgress() {
    stopProgress();
    $("#cycle-interval").val("");
  }
});
