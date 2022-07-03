<?php
    // Import Special Session Module
    include_once "modules/session-module.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "template/meta-info.php"; ?>
        <title>Register - BF Task</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/login-register.css" rel="stylesheet" />
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg my-5">
                                    <div class="card-header" id="login-register-header">
                                        <img src="assets/img/bf-task-logo.svg" />
                                        <h3 class="text-center font-weight-light my-4">Create An Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form  action="modules/processes/account-process.php" method="post" novalidate>
                                            <div class="text-center text-danger" id="error-msg">
                                                <?= set_flashdata('registration-status')?>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" name="inputFirstName" placeholder="Enter your first name" />
                                                        <label>First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" name="inputLastName" placeholder="Enter your last name" />
                                                        <label>Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="inputEmail" placeholder="name@example.com" />
                                                <label>Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" class="form-control" name="inputPassword" placeholder="Create a password" />
                                                        <label>Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" class="form-control" name="inputPasswordConfirm" placeholder="Confirm password" />
                                                        <label>Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="account-action" value="register">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
                if ($("input[name=inputFirstName]").val() == "") {
                    $("input[name=inputFirstName]").addClass("input-error");
                    errorMsg = "Please enter the required input";
                    flag = false;
                }
                if ($("input[name=inputLastName]").val() == "") {
                    $("input[name=inputLastName]").addClass("input-error");
                    errorMsg = "Please enter the required input";
                    flag = false;
                }
                if ($("input[name=inputEmail]").val() == "") {
                    $("input[name=inputEmail]").addClass("input-error");
                    errorMsg = "Please enter the required input";
                    flag = false;
                } else if (!validateEmailAddress($("input[name=inputEmail]").val())) {
                    $("input[name=inputEmail]").addClass("input-error");
                    errorMsg = "Please enter the valid email address";
                    flag = false;
                }
                if ($("input[name=inputPassword]").val() == "") {
                    $("input[name=inputPassword]").addClass("input-error");
                    errorMsg = "Please enter the required input";
                    flag = false;
                }
                if ($("input[name=inputPasswordConfirm]").val() == "") {
                    $("input[name=inputPasswordConfirm]").addClass("input-error");
                    errorMsg = "Please enter the required input";
                    flag = false;
                } else if ($("input[name=inputPasswordConfirm]").val() != $("input[name=inputPassword]").val()) {
                    $("input[name=inputPassword], input[name=inputPasswordConfirm]").addClass("input-error");
                    errorMsg = "Please match the password and confirm password";
                    flag = false;
                }
                $("#error-msg").html(errorMsg);
                return flag;
            });
        </script>
    </body>
</html>
