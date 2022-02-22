$(document).ready(function () {
  // Show toast function
  function showToast(text, heading, type) {
    $.toast({
      text: text, // Text that is to be shown in the toast
      heading: heading, // Optional heading to be shown on the toast
      icon: type, // Type of toast icon
      showHideTransition: "fade", // fade, slide or plain
      allowToastClose: true, // Boolean value true or false
      hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
      stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
      position: "top-right", // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

      textAlign: "left", // Text alignment i.e. left, right or center
      loader: true, // Whether to show loader or not. True by default
      loaderBg: "#9EC600", // Background color of the toast loader
      beforeShow: function () {}, // will be triggered before the toast is shown
      afterShown: function () {}, // will be triggered after the toat has been shown
      beforeHide: function () {}, // will be triggered before the toast gets hidden
      afterHidden: function () {} // will be triggered after the toast has been hidden
    });

    $("#admin_login_btn").click(function (e) {
      e.preventDefault();
      $("#admin_login_btn").val("Please Wait..");
      showToast("Hi I am Iqbal", "success", "success");
    });
  }
});
