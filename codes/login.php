<?php
    // Import Special Session Module
    include_once "modules/session-module.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "template/meta-info.php"; ?>
        <title>Login - BF Task</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/login-register.css" rel="stylesheet" />
    </head>
    <body class="bg-dark">
        <!-- Main Layout -->
        <div id="layoutAuthentication">
            <!-- Layout Content -->
            <div id="layoutAuthentication_content">
                <main>
                    <!-- Main Container -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg my-5">
                                    <!-- Login Header -->
                                    <div class="card-header" id="login-register-header">
                                        <img src="assets/img/bf-task-logo.svg" />
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <!-- Login Form -->
                                    <div class="card-body">
                                        <form action="modules/processes/account-process.php" method="post" novalidate>
                                            <div class="text-center text-danger" id="error-msg">
                                                <?= set_flashdata('registration-status')?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="inputEmail" placeholder="name@example.com" />
                                                <label>Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="inputPassword" placeholder="Password" />
                                                <label>Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" name="inputRememberMe" />
                                                <label class="form-check-label">Remember Me</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary" name="account-action" value="login">Login</button>
                                            </div>
                                            <!-- Google Sign-in -->
                                            <div class="mb-3">
                                                <p class="text-center custom-or-text">OR</p>
                                                <button type="button" id="google-login-btn">
                                                    <img src="assets/img/google_g_logo.svg" />
                                                    <p>LOGIN WITH GOOGLE</p>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include_once "template/footer.php"; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- General Internal Script -->
        <script>
            $("form").submit(function () {
                var flag = true;
                var errorMsg = "";
                $("input").removeClass("input-error");
                if ($("input[name=inputEmail]").val() == "") {
                    $("input[name=inputEmail]").addClass("input-error");
                    errorMsg = "<p>Please enter the required input</p>";
                    flag = false;
                } else if (!validateEmailAddress($("input[name=inputEmail]").val())) {
                    $("input[name=inputEmail]").addClass("input-error");
                    errorMsg = "Please enter the valid email address";
                    flag = false;
                }
                if ($("input[name=inputPassword]").val() == "") {
                    $("input[name=inputPassword]").addClass("input-error");
                    errorMsg = "<p>Please enter the required input</p>";
                    flag = false;
                }
                $("#error-msg").html(errorMsg);
                return flag;
            });
        </script>
    </body>
</html>
