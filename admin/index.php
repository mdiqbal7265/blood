<?php

session_start();
if(isset($_SESSION['email'])){
    header('location: dashboard.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login-Admin</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 border-danger">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-bold text-danger my-4">Admin-Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" id="admin_login_form">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                            <span class="text-danger" id="email_err"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="password">Password</label>
                                            <span class="text-danger" id="password_err"></span>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" name="rem" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                            <input type="submit" value="Login" class="btn btn-primary" id="admin_login_btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <script>
        $(document).ready(function() {

            function showToast(heading, text, type) {
                $.toast({
                    heading: heading,
                    text: text,
                    showHideTransition: 'slide',
                    icon: type,
                    position: 'top-right',
                    hideAfter: 5000,
                });
            }

            $("#admin_login_btn").click(function(e) {
                e.preventDefault();
                $("#admin_login_btn").val('Please Wait..');
                if ($("#email").val() == '') {
                    $("#admin_login_btn").val('Login');
                    showToast('Error', 'Email Must be required', 'error');
                }else if($("#password").val() == ''){
                    $("#admin_login_btn").val('Login');
                    showToast('Error', 'Password Must Be Required', 'error');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "../lib/admin.php",
                        data: $("#admin_login_form").serialize() + '&action=admin_login',
                        success: function(response) {
                            $("#admin_login_btn").val('Login');
                            $("#admin_login_form")[0].reset();
                            if (response == 'login') {
                                showToast('Success', 'Login Successfully. Please wait a second we will redirect you in dashboard', 'success');
                                setTimeout(function() {
                                    window.location = "dashboard.php";
                                }, 4000);
                            } else if (response == 'password_not_matched') {
                                showToast('Error', 'Password didn\'t matched in your email. Please try again', 'error');
                            } else if (response == 'data_not_found') {
                                showToast('Error', 'We didn\'t find your email in our database.', 'error');
                            }
                        }
                    });
                }

            });
        });
    </script>
</body>

</html>