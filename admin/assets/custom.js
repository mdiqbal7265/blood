$(document).ready(function () {

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

  // admin Logout Section

  $("#logout").click(function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../lib/admin.php",
      data: { action: "admin_logout" },
      success: function (response) {
        if (response == "logout") {
          window.location = "index.php";
        } else {
            showToast('Error','Logout Failed. Something went Wrong.','error');
        }
      }
    });
  });
});
