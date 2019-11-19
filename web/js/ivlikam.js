function test_ivli_connection() {
    let apikey=$('input[name="IVLI_TOKEN"]').val()
    let status=$("#test_ivli_connection_status")
    let button=$("#test_ivli_connection_button")
    let buttonText = button.text()

    button.addClass('disabled');
    button.text("Testing...");
    status.text("")

    $.ajax("/test_ivli_connection.php", {
        type: "POST",
        data: "apikey=" + apikey,
        success: function(data, textStatus, xhr) {
            button.removeClass("disabled");
            button.text(buttonText)

            if (data === "OK") {
                status.text('Connection successful');
            } else {
                status.text('Connection failed');
            }
        }
    })
}

function check_for_connectivity() {
  retryms = 10000;

  if (typeof hasLostConnectionAtSomePoint === 'undefined')
    hasLostConnectionAtSomePoint = false;

  successCallback = function(data, textStatus, xhr) {
      if (data !== "OK")
          hasLostConnectionAtSomePoint = true;
      if(data === "OK" && hasLostConnectionAtSomePoint)
          location.reload();
      else
          setTimeout(check_for_connectivity, retryms);
  }

  $.ajax("/connectivity_status.php", {
    timeout: retryms,
    error: function(xhr, textStatus, serverError) {
      hasLostConnectionAtSomePoint = true;
    },
    success: successCallback
  })
}
