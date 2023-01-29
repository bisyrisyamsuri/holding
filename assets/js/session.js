function check_session_id() {
    var session_id = "<?php echo $_SESSION['session_id']; ?>";
    fetch("session-check.php")
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {
        if (responseData.output == "logout") {
          window.location.href = "auth-login.php";
        }
      });
  }

  setInterval(function () {
    check_session_id();
  }, 2000);