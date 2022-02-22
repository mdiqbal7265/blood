$(document).ready(function () {
  // Data table
  

  // show Toast message function
  function showToast(heading, text, type) {
    $.toast({
      heading: heading,
      text: text,
      showHideTransition: "slide",
      icon: type,
      position: "top-right",
      hideAfter: 5000
    });
  }

  // Fetch All District by the division id
  $("#division").on("change", function () {
    var divid = $(this).val();
    $.ajax({
      type: "POST",
      url: "../lib/action.php",
      data: { divid: divid },
      success: function (response) {
        $("#district").html(response);
        $("#thana").html('<option value="">Select Upazilla</option>');
        // console.log(response);
      }
    });
  });

  // Fetch ALl Upazilla By The district id

  $("#district").on("change", function () {
    var disid = $(this).val();
    $.ajax({
      type: "POST",
      url: "../lib/action.php",
      data: { disid: disid },
      success: function (response) {
        $("#thana").html(response);
        // console.log(response);
      }
    });
  });

  // User Register By Ajax Request
  $("#register_btn").click(function (e) {
    if ($("#registration_form")[0].checkValidity()) {
      e.preventDefault();
      $("#register_btn").val("Please Wait...");
      $.ajax({
        type: "POST",
        url: "../lib/action.php",
        data: $("#registration_form").serialize() + "&action=register",
        success: function (response) {
          if (response == "user_exists") {
            $("#register_btn").val("Register");
            showToast(
              "Error",
              "Uername Exists. Please try another username",
              "error"
            );
          } else if (response == "failed") {
            $("#register_btn").val("Register");
            showToast(
              "Error",
              "Something went wrong. Please try again latter",
              "error"
            );
          } else if (response == "register") {
            $("#register_btn").val("Register");
            $("#registration_form")[0].reset();
            $("#RegisterModal").modal("hide");
            showToast(
              "Success",
              "Registration Succsfully. Please wait a moment we will redirect you in dashboard",
              "success"
            );
            setTimeout(() => {
              window.location = "dashboard.php";
            }, 3000);
          }
        }
      });
    }
  });

  // Member login ajax request

  $("#login_btn").click(function (e) {
    e.preventDefault();
    $("#login_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#login_form").serialize() + "&action=login",
      success: function (response) {
        if (response == "login") {
          $("#login_btn").val("Login");
          $("#login_form")[0].reset();
          $("#LoginModal").modal("hide");
          showToast(
            "Success",
            "Login Successfully. Please wait a second we will redirect you in dashboard",
            "success"
          );
          setTimeout(function () {
            window.location = "dashboard.php";
          }, 4000);
        } else if (response == "password_not_matched") {
          $("#login_btn").val("Login");
          $("#login_form")[0].reset();
          showToast(
            "Error",
            "Password didn't matched in your email. Please try again",
            "error"
          );
        } else if (response == "data_not_found") {
          $("#login_btn").val("Login");
          $("#login_form")[0].reset();
          showToast(
            "Error",
            "We didn't find your username in our database. Please try again",
            "error"
          );
        }
      }
    });
  });

  // Member logout Ajax Request
  $("#logout").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "logout" },
      success: function (response) {
        if (response == "logout") {
          window.location = "index.php";
        }
      }
    });
  });

  // Fetch Donation Details
  fetchDetails();
  function fetchDetails() {
    id = $("#member_id").val();
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "fetch_details", id: id },
      success: function (response) {
        $("#display_details").html(response);
        $("#example").DataTable({
          pageLength: 5,
          lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20]
          ]
        });
      }
    });
  }

  // Add Donation Details
  $("#add_details_btn").click(function (e) {
    e.preventDefault();
    $("#add_details_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#add_details_form").serialize() + "&action=add_details",
      success: function (response) {
        $("#add_details_btn").val("Add Details");
        $("#add_details_form")[0].reset();
        $("#addDetails").modal("hide");
        showToast("Success", "Data Inserted Successfully", "success");
        fetchDetails();
      }
    });
  });
});
